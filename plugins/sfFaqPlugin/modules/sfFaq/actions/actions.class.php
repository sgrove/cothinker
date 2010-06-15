<?php

/**
 * Faq module
 *
 * The front can be full JS nothing reload OR one click reload the page with a good URL for the referencement
 * cf : README
 *
 * @package sfFaqPlugin
 * @author Jonathan Démoutiez <jonathan@demoutiez.net>
 */
class sfFaqActions extends sfActions
{
	public function preExecute()
	{
		if (sfConfig::get('app_sfFaqPlugin_js', false) && $this->getActionName() != 'indexJs') {
			$this->forward('sfFaq', 'indexJs');
		}
		if (!sfConfig::get('app_sfFaqPlugin_js', false) && $this->getActionName() != 'index') {
			$this->forward('sfFaq', 'index');
		}

		$this->initList();
	}

	public function executeIndex() {
		if ($this->hasRequestParameter('faq_id')) {
			$this->setVar('selectedFaq', sfFaqFaqPeer::retrieveByPk($this->getRequestParameter('faq_id')));
			if (!$this->selectedFaq->getsfFaqCategory()->getActivate())
				$this->redirect('sfFaq/index');
		}
		if (!isset($this->selectedFaq) && !$this->selectedFaq) {
			if ($this->hasRequestParameter('category_id')){
				$this->setVar('selectedCategory', sfFaqCategoryPeer::retrieveByPk($this->getRequestParameter('category_id')));
				if (!$this->selectedCategory->getActivate())
					$this->redirect('sfFaq/index');
				$this->defaultQuestionSelection();
			}
			else
				$this->defaultSelection();
		}
		else {
			$this->setVar('selectedCategory', $this->selectedFaq->getsfFaqCategory());
		}
	}

	public function executeIndexJs() {
		$this->defaultSelection();
	}
	
	/**
	 * Private methods
	 *
	 * @author Jonathan Démoutiez
	 */
	private function initList()
	{
		$this->setVar('categoriesList', sfFaqCategoryPeer::getActiveCategories());
	}
	
	private function defaultSelection()
	{
		$this->defaultCategorySelection();
		$this->defaultQuestionSelection();
	}
	
	private function defaultCategorySelection()
	{
		if (sfConfig::get('app_sfFaqPlugin_first_category_by_default', false) && !isset($this->selectedCategory) && !$this->selectedCategory) {
			$this->setVar('selectedCategory', sfFaqCategoryPeer::getFirstActiveCategory());

			$this->defaultQuestionSelection();
		}
		else{
			$this->setVar('selectedCategory', NULL);
			$this->setVar('selectedFaq', NULL);
		}
	}
	
	private function defaultQuestionSelection()
	{
		if (sfConfig::get('app_sfFaqPlugin_first_question_by_default', false) && $this->selectedCategory){
			$selectedFaqs = $this->selectedCategory->getsfFaqFaqs();
			if (is_array($selectedFaqs)) {
				$this->setVar('selectedFaq', array_shift($selectedFaqs));
			}
		}
		else {
			$this->setVar('selectedFaq', NULL);
		}
	}
}
