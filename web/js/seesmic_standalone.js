if(typeof $=="undefined"){var $=function(A){return document.getElementById(A)}}if(typeof seesmic=="undefined"){var seesmic={}}var swfUrl="http://seesmic.com/embeds/wrapper.swf";seesmic.player=new function(){var A=this;this.recorder;this.ready=false;this.getRecorder=function(){return $("seesmicrecorder")};this.domLoaded=function(){return !!$("seesmicrecorder")};this.setError=function(B){this.getRecorder().setError(B)};this.playerLoaded=function(){this.ready=true;this.recorder=$("seesmicrecorder")};this.createSWF=function(K,B,D,F,C,M,H,N){var J="";var L=300;var I=270;var E={quality:"high",bgcolor:"#000000",allowFullScreen:"true",allowScriptAccess:"always",flashVars:"version="+K+"&urlName="+F+"&video="+C+"&closable="+M+"&startVideo="+H};if(document.all){J='<object id="'+B+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+L+'" height="'+I+'" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">  <param name="movie" value="'+swfUrl+'" />';for(var G in E){J+='  <param name="'+G+'" value="'+E[G]+'" />'}J+="</object>"}else{J='<embed id="'+B+'" src="'+swfUrl+'" width="'+L+'" height="'+I+'" play="true" loop="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"';for(G in E){J+=" "+G+'="'+E[G]+'"'}J+="></embed>"}D.innerHTML=J};this.createPlayer=function(B,E,D,C){seesmic.player.createSWF("player","seesmicplayer"+E,B,"",E,D,C)};this.createRecorder=function(B,D,C){seesmic.player.createSWF("recorder","seesmicrecorder",B,D,C,"","")}};function seePlayVideo(A,C){var B=$(A+"_content");var E=$(A+"_preview");var F=$(A+"_hide");var D=$(A+"_show");if(C){seesmic.player.createPlayer(B,A,true,true);E.style.display="none";F.style.display="block";D.style.display="none"}else{B.innerHTML="";E.style.display="block";F.style.display="none";D.style.display="block"}}function setCookieStrig(A){document.cookie=A}function set_cookie(B,G,I,F,H,J,E,A){var D=B+"="+escape(G);if(I){var C=new Date(I,F,H);D+="; expires="+C.toGMTString()}if(J){D+="; path="+escape(J)}if(E){D+="; domain="+escape(E)}if(A){D+="; secure"}document.cookie=D}function get_cookie(B){var A=document.cookie.match(B+"=(.*?)(;|$)");if(A){return(unescape(A[1]))}else{return null}}function delete_cookie(B){var A=new Date();A.setTime(A.getTime()-1);document.cookie=B+="=; expires="+A.toGMTString()};