uagent = window.navigator.userAgent.toLowerCase();IEB=(uagent.indexOf('msie') != -1)?true:false;OPB=(uagent.indexOf('opera') != -1)?true:false;CRB=(uagent.indexOf('chrome') != -1)?true:false;SFB=(uagent.indexOf('safari') != -1)?true:false;FFB=(uagent.indexOf('firefox') != -1)?true:false;var scompat = document.compatMode;function secondcomplate(){this.c=1;}function slide1ScSlideShow(){var CursorStr="default";var Xpos=0;var yy=0;function CreateThumbnails(){if(thumbgoster!=1){return;}tleft=0;ttop=0;lll1llll=0;lll1lllll=0;lllllllllll=70+2*2+2*1;llllllllllll=70+2*2+2*1;if(0==0){ll1llll=llllllllllll;if((IEB==true)&&(scompat == "BackCompat" )){lll1lllll=llllllllllll+(2*0)+(0+0);lll1llll=ll1lll+(2*0)+(0+0);}else{lll1lllll=llllllllllll+(0+0);lll1llll=ll1lll+(0+0);}lllllllll=(3*lllllllllll)+((3-1)*4);llllllllll=llllllllllll;}else{ll1lll=lllllllllll;if((IEB==true)&&(scompat == "BackCompat" )){lll1llll=lllllllllll+(2*0)+(0+0);lll1lllll=ll1llll+(2*0)+(0+0);}else{lll1llll=lllllllllll+(0+0);lll1lllll=ll1llll+(0+0);}lllllllll=lllllllllll;llllllllll=(3*llllllllllll)+((3-1)*4);}MoveIcWidth=lllllllll-2*lllllllllll;MoveIcHeight=llllllllll-2*llllllllllll;lll1 = spageObj.appendChild(document.createElement("DIV"));lll1.style.position="absolute";lll1.style.left=""+10+"px";lll1.style.top=""+230+"px";lll1.style.borderStyle=""+'solid';lll1.style.borderWidth=""+0+"px";lll1.style.borderColor="#000000";lll1.style.zIndex=0+4;lll1.style.width=""+lll1llll+"px";lll1.style.height=""+lll1lllll+"px";lll1.style.visibility="inherit";lll1.style.backgroundColor="";lll1.style.backgroundImage="";lll1.style.backgroundRepeat="no-repeat";lll1.style.backgroundPosition=""+0+"px "+0+"px";l1lllllllll = lll1.appendChild(document.createElement("DIV"));l1lllllllll.id="thumbsid";l1lllllllll.style.position="absolute";l1lllllllll.style.width=""+ll1lll+"px";l1lllllllll.style.height=""+ll1llll+"px";l1lllllllll.style.visibility="inherit";l1lllllllll.style.overflow="hidden";l1lllllllll.style.left=""+0+"px";l1lllllllll.style.top=""+0+"px";l1lllllllll.style.zIndex=0+4;l1lllllllll.style.borderStyle="solid";l1lllllllll.style.borderWidth="0px";l1lllllllll.onmousemove=ffffffff;l1lllllllll.onmouseover=ff;l1lllllllll.onmouseout=fff;l1llllllllll = l1lllllllll.appendChild(document.createElement("DIV"));l1llllllllll.id="altid";l1llllllllll.style.position="absolute";l1llllllllll.style.width=""+ll1lll+"px";l1llllllllll.style.height=""+ll1llll+"px";l1llllllllll.style.visibility="inherit";l1llllllllll.style.overflow="hidden";l1llllllllll.style.left="0px";l1llllllllll.style.top="0px";l1llllllllll.style.borderStyle="solid";l1llllllllll.style.borderWidth="0px";l1llllllllll.style.borderColor="#000000";l1llllllllll.style.zIndex=0;l1llllllllll.style.backgroundColor="#000000";if(IEB==true){l1llllllllll.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=1)";}else{l1llllllllll.style.opacity=0.01;}l1lllllllllll = l1lllllllll.appendChild(document.createElement("DIV"));l1lllllllllll.id="movingdiv";l1lllllllllll.style.position="absolute";l1lllllllllll.style.left="0px";l1lllllllllll.style.top="0px";l1lllllllllll.style.zIndex=1;l1lllllllllll.style.width=""+lllllllll+"px";l1lllllllllll.style.height=""+llllllllll+"px";l1lllllllllll.style.visibility="inherit";l1lllllllllll.style.overflow="visible";l1lllllllllll.style.borderStyle="solid";l1lllllllllll.style.borderWidth="0px";l1lllllllllll.style.borderColor="#000000";var lll1llllll=0;var lll1lllllll=0;if(1==1){lll1llllll=70-(2*0);lll1lllllll=70-(2*0);}else{lll1llllll=20;lll1lllllll=20;}for(i=0;i<3;i++){if(0==0){tleft=((i*lllllllllll)+(i*4));ttop=0;}else{tleft=0;ttop=((i*llllllllllll)+(i*4));}lll1l = l1lllllllllll.appendChild(document.createElement("DIV"));lll1l.id="thumb"+i;lll1l.style.position="absolute";lll1l.style.left=""+tleft+"px";lll1l.style.top=""+ttop+"px";lll1l.style.cursor='pointer';lll1l.indx=i;lll1l.style.overflow="hidden";lll1l.style.width=""+(lllllllllll)+"px";lll1l.style.height=""+(llllllllllll)+"px";lll1l.hs=0;lll1l.mouse_pos=0;lll1l.onclick= ffffffffffff;lll1l.onmouseover=fffff;lll1l.onmouseout=ffff;l1llllllllllll = lll1l.appendChild(document.createElement("DIV"));l1llllllllllll.style.zIndex=1;l1llllllllllll.style.padding=""+2+"px";l1llllllllllll.style.cursor='pointer';l1llllllllllll.style.backgroundColor='';l1llllllllllll.style.borderStyle=""+'solid';l1llllllllllll.style.borderWidth=""+1+"px";l1llllllllllll.style.borderColor=""+"#999999";l1llllllllllll.indx=i;l1llllllllllll.style.overflow="hidden";if((IEB==true)&&(scompat == "BackCompat" )){l1llllllllllll.style.width=""+(lllllllllll)+"px";l1llllllllllll.style.height=""+(llllllllllll)+"px";}else{l1llllllllllll.style.width=""+(lllllllllll-(2*2+2*1))+"px";l1llllllllllll.style.height=""+(llllllllllll-(2*2+2*1))+"px";}l1llllllllllll.style.backgroundImage="";l1llllllllllll.style.backgroundRepeat="no-repeat";l1llllllllllll.style.backgroundPosition=""+0+"px "+0+"px";l1llllllllllll.style.color="#000000";l1llllllllllll.style.fontFamily="Arial,Verdana,Tahoma";l1llllllllllll.style.fontSize=12+"pt";l1llllllllllll.style.fontStyle="normal";l1llllllllllll.style.fontWeight="normal";l1llllllllllll.style.textAlign="center";lll1ll = l1llllllllllll.appendChild(document.createElement("IMG"));lll1ll.src=thumbimgstr[i];lll1ll.style.display="block";lll1ll.style.position="relative";lll1ll.style.left="0px";lll1ll.style.top="0px";lll1ll.style.width=""+lll1llllll+"px";lll1ll.style.height=""+lll1lllllll+"px";lll1ll.style.margin="0px auto 0px auto";lll1ll.style.borderStyle=""+"solid";lll1ll.style.borderWidth=""+0+"px";lll1ll.style.borderColor=""+"#000000";if(0==0){lll1ll.style.styleFloat="none";lll1ll.style.cssFloat="none";}else if(0==1){lll1ll.style.styleFloat="left";lll1ll.style.cssFloat="left";}else if(0==2){lll1ll.style.styleFloat="right";lll1ll.style.cssFloat="right";}ThumbSpan = l1llllllllllll.appendChild(document.createElement("SPAN"));ThumbSpan.innerHTML=thumbtextarr[i];ThumbCurtImg = l1llllllllllll.appendChild(document.createElement("DIV"));ThumbCurtImg.style.position="absolute";ThumbCurtImg.style.zIndex=2;ThumbCurtImg.style.width=""+lll1llllll+"px";ThumbCurtImg.style.height=""+lll1lllllll+"px";ThumbCurtImg.style.backgroundColor="#000000";if(IEB==true){ThumbCurtImg.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+"0"+")";}else{ThumbCurtImg.style.opacity="0.00";}ThumbCurtImg.style.left=""+(lll1ll.offsetLeft+0)+"px";ThumbCurtImg.style.top=""+(lll1ll.offsetTop+0)+"px";lll1lll = lll1l.appendChild(document.createElement("DIV"));lll1lll.style.zIndex=2;lll1lll.sid=33;lll1lll.style.position="absolute";lll1lll.style.width=""+(lllllllllll)+"px";lll1lll.style.height=""+(llllllllllll)+"px";lll1lll.style.left="0px";lll1lll.style.top="0px";lll1lll.style.backgroundColor="#000000";lll1lll.style.borderStyle="solid";lll1lll.style.borderWidth="0px";lll1lll.style.borderColor="#000000";lll1lll.style.padding="0px";lll1lll.style.overflow="hidden";if(IEB==true){lll1lll.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=1)";}else{lll1lll.style.opacity=0.01;}lllllllllllllll[i]=lll1l;ThumbContArr[i]=l1llllllllllll;lll1llArr[i]=lll1ll;ThumbCurtainImgArr[i]=ThumbCurtImg;}moving_obj=l1lllllllllll;}function ff(){lllllll=1;}function fff(){lllllll=0;}function ffffffff(event){if(ll1lll>=lllllllll){return;}var EX=0;e=null;if((IEB==true)||(OPB==true)||(CRB==true)||(SFB==true)){EX=parseInt(window.event.offsetX);e=window.event.srcElement;}else{EX=parseInt(event.layerX);e=event.target;}var obj=e;if(obj){if(obj==moving_obj){Xpos=EX+parseInt(""+moving_obj.style.left);zz=Xpos-lllllllllll;oran=(zz/(ll1lll-2*lllllllllll));yy=Xpos-parseInt(oran*MoveIcWidth)-lllllllllll;if(yy>0){yy=0;}if(yy<(ll1lll-lllllllll)){yy=ll1lll-lllllllll;}ffffff();}else if(obj.sid==33){obj2=obj.offsetParent;Xpos=EX+parseInt(obj2.style.left)+parseInt(""+moving_obj.style.left);zz=Xpos-lllllllllll;oran=(zz/(ll1lll-2*lllllllllll));yy=Xpos-parseInt(oran*MoveIcWidth)-lllllllllll;if(yy>0){yy=0;}if(yy<(ll1lll-lllllllll)){yy=ll1lll-lllllllll;}ffffff();}}}function fffffff(event){if(ll1llll>=llllllllll){return;}var EX=0;e=null;if((IEB==true)||(OPB==true)||(CRB==true)||(SFB==true)){EX=parseInt(window.event.offsetY);e=window.event.srcElement;}else{EX=parseInt(event.layerY);e=event.target;}var obj=e;if(obj){if(obj==moving_obj){Xpos=EX+parseInt(""+moving_obj.style.top);zz=Xpos-llllllllllll;oran=(zz/(ll1llll-2*llllllllllll));yy=Xpos-parseInt(oran*MoveIcHeight)-llllllllllll;if(yy>0){yy=0;}if(yy<(ll1llll-llllllllll)){yy=ll1llll-llllllllll;}ffffff();}else if(obj.sid==33){obj2=obj.offsetParent;Xpos=EX+parseInt(obj2.style.top)+parseInt(""+moving_obj.style.top);zz=Xpos-llllllllllll;oran=(zz/(ll1llll-2*llllllllllll));yy=Xpos-parseInt(oran*MoveIcHeight)-llllllllllll;if(yy>0){yy=0;}if(yy<(ll1llll-llllllllll)){yy=ll1llll-llllllllll;}ffffff();}}}function ffffff(){if(0==0){if(1==0){moving_obj.style.left=""+(yy)+  "px";}else{ffffffffff();}}else{if(1==0){moving_obj.style.top=""+(yy)+  "px";}else{ffffffffff();}}}function fffffffff(rc){if(lllllll==1){return;}if(1==0){return;}if(0==0){if(ll1lll>=lllllllll){return;}}else{if(ll1llll>=llllllllll){return;}}my=0;clearTimeout(ll1l);if(1==1){if(0==0){my=(-1)*(parseInt(lllllllllllllll[rc].style.left) - (parseInt(ll1lll/2)-parseInt(lllllllllll/2)));if(my>0){my=0;}if(my<        ((-1)*(lllllllll-ll1lll))         ){my=((-1)*(lllllllll-ll1lll));}ll1llllllllll=parseInt(moving_obj.style.left);}else{my=(-1)*(parseInt(lllllllllllllll[rc].style.top) - (parseInt(ll1llll/2)-parseInt(llllllllllll/2)));if(my>0){my=0;}if(my<        ((-1)*(llllllllll-ll1llll))         ){my=((-1)*(llllllllll-ll1llll));}ll1llllllllll=parseInt(moving_obj.style.top);}}else{if(0==0){my=((-1)*parseInt(lllllllllllllll[rc].style.left));if(my>0){my=0;}if(my<        ((-1)*(lllllllll-ll1lll))      ){my=((-1)*(lllllllll-ll1lll));}ll1llllllllll=parseInt(moving_obj.style.left);}else{my=((-1)*parseInt(lllllllllllllll[rc].style.top));if(my>0){my=0;}if(my<        ((-1)*(llllllllll-ll1llll))     ){my=((-1)*(llllllllll-ll1llll));}ll1llllllllll=parseInt(moving_obj.style.top);}}Art=0;Tutyy=my;Fark=Tutyy-ll1llllllllll;TutFark=Fark;Kalan=Fark;if(Fark==0){return;}CY=ll1llllllllll;llllll=0;if(Fark<0){llllll=1;}ThumbScrollReason=1;fffffffffff();}function ffffffffff(){clearTimeout(ll1l);Art=0;Tutyy=yy;if(0==0){ll1llllllllll=parseInt(moving_obj.style.left);}else{ll1llllllllll=parseInt(moving_obj.style.top);}Fark=Tutyy-ll1llllllllll;TutFark=Fark;Kalan=Fark;if(Fark==0){return;}CY=ll1llllllllll;ThumbScrollReason=0;llllll=0;if(Fark<0){llllll=1;}if((1==1) || (1==2) || (1==3)){fffffffffff();}}function fffffffffff(){if(ThumbScrollReason==1){if(llllll==1){Art=Art-1;}else{Art=Art+1;}CY=CY+Art;}else{if(1==1){if(llllll==1){Art=Art-1;}else{Art=Art+1;}CY=CY+Art;}else if(1==2){if(llllll==1){Art=Math.floor(Kalan/12);}else{Art=Math.ceil(Kalan/12);}if((Art>1) || (Art<(-1))){Kalan=Kalan-Art;}else{if(llllll==1){Kalan=Kalan-(-1);}else{Kalan=Kalan-(+1);}}CY=ll1llllllllll+TutFark-(Kalan);}else if(1==3){if(llllll==1){Art=Math.floor(TutFark/20);}else{Art=Math.ceil(TutFark/20);}CY=CY+Art;}}if(llllll==1){if(CY>Tutyy){ll1l=setTimeout("slide1.fffffffffff()",20);}else{CY=Tutyy;}}else{if(CY<Tutyy){ll1l=setTimeout("slide1.fffffffffff()",20);}else{CY=Tutyy;}}if(0==0){moving_obj.style.left=""+(CY)+"px";}else{moving_obj.style.top=""+(CY)+"px";}}function fff1f(tn){ThumbContArr[tn].style.borderColor="#990000";ThumbContArr[tn].style.backgroundColor='';ThumbContArr[tn].style.backgroundImage="";ThumbContArr[tn].style.color="#999999";lll1llArr[tn].style.borderColor="#000000";lllllllllllllll[tn].hs=1;ThumbCurtainImgArr[tn].style.visibility="hidden";}function fff1(tn){if(lllllllllllllll[tn].mouse_pos==0){ThumbContArr[tn].style.borderColor="#999999";ThumbContArr[tn].style.backgroundColor='';ThumbContArr[tn].style.backgroundImage="";ThumbContArr[tn].style.color="#000000";lll1llArr[tn].style.borderColor="#000000";lllllllllllllll[tn].hs=0;ThumbCurtainImgArr[tn].style.visibility="inherit";}}function thumbjustswitch(indxg){clearTimeout(ll1ll);clearTimeout(lll1llllllllll);if((indxg==llll)&&(Beklemedemi==1)){return;}if((IEB==true)&&(2==1)&&(Beklemedemi==0)){spageIcObj.filters[0].stop();}eskicurr=ll;eskinext=lll;if(0==1){if(llll!=indxg){llllllllllllll[llll].style.visibility="hidden";}if(eskicurr!=indxg){llllllllllllll[eskicurr].style.visibility="hidden";}if(eskinext!=indxg){llllllllllllll[eskinext].style.visibility="hidden";}}lll=indxg;lllllllllllll[lll].style.visibility="visible";lllllllllllll[lll].style.left="0px";lllllllllllll[lll].style.top="0px";if(2==1){if(IEB==true){lllllllllllll[lll].style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";}else{lllllllllllll[lll].style.opacity=1.00;}}ll=llll;if(ll!=lll){lllllllllllll[ll].style.visibility="hidden";}if(eskicurr!=lll){lllllllllllll[eskicurr].style.visibility="hidden";}if(eskinext!=lll){lllllllllllll[eskinext].style.visibility="hidden";}if(0==1){if((titarr[lll].length>0)||(desarr[lll].length>0)){llllllllllllll[lll].style.left=""+0+"px";llllllllllllll[lll].style.top=""+0+"px";llllllllllllll[lll].style.visibility="visible";if(IEB==true){llllllllllllll[lll].style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";}else{llllllllllllll[lll].style.opacity = 1.00;}}}llll=lll;Beklemedemi=1;}function ffff(){this.mouse_pos=0;thumbmouseic=0;if(llll==this.indx){}else{fff1(this.indx);}if(0==1){ll1ll=setTimeout("slide1.ContinueSlideshow()",4000);}}function fffff(){this.mouse_pos=1;thumbmouseic=1;fff1f(this.indx);if(0==1){thumbjustswitch(this.indx);}for(i=0;i<3;i++){if((lllllllllllllll[i].hs==1)&&(i!=llll)){fff1(i);}}}function ffffffffffff(){if(0==1){return;}if(Beklemedemi==0){return;}clearTimeout(ll1ll);f1f(llll,this.indx);ff1fffff(50);}function fffffffffffff(){if((1==1)&&(0==0)){fff1(ll);fff1f(llll);fffffffff(llll);}f1ffffffffffff(llll);}function f1fffffffffff(){ll1lllllllllll=spageObj.appendChild(document.createElement("IMG"));ll1lllllllllll.src="";ll1lllllllllll.style.position="absolute";ll1lllllllllll.style.zIndex=0+7;ll1lllllllllll.style.visibility="inherit";ll1lllllllllll.style.left=0+"px";ll1lllllllllll.style.top=0+"px";if(0==1){ll1lllllllllll.style.width=""+0+"px";ll1lllllllllll.style.height=""+0+"px";}if(100==100){return;}if(IEB==true){if(100!=100){ll1lllllllllll.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+100+")";}}else{ll1lllllllllll.style.opacity=0.100;}}function f1ffffffffffff(gcur){if(0!=1){return;}ll1llllllllllll.innerHTML=""+""+(gcur+1)+"&nbsp;of&nbsp;"+3+"";}function f1fffffffffffff(){if(0!=1){return;}ll1llllllllllll = spageObj.appendChild(document.createElement("DIV"));ll1llllllllllll.style.position="absolute";ll1llllllllllll.style.zIndex=0+6;ll1llllllllllll.style.display="block";ll1llllllllllll.style.left=""+0+"px";ll1llllllllllll.style.top=""+0+"px";ll1llllllllllll.style.borderWidth=""+0+"px";ll1llllllllllll.style.borderStyle="solid";    ll1llllllllllll.style.visibility="inherit";ll1llllllllllll.style.textAlign="left";ll1llllllllllll.style.cursor='default';ll1llllllllllll.style.overflow="visible";ll1llllllllllll.style.fontFamily="Verdana";ll1llllllllllll.style.fontSize=10+"pt";    ll1llllllllllll.style.fontStyle="normal";ll1llllllllllll.style.fontWeight="bold";    ll1llllllllllll.style.color="#000000";ll1llllllllllll.innerHTML="";}function ff1fff(){ix=this.indx;if(linkstr[ix].substring(0,11)=="javascript:"){eval(""+linkstr[ix]);return;}if(targetstr[ix]==''){targetstr[ix]='_self';}if(IEB){window.open(''+linkstr[ix],''+targetstr[ix]);}else{if((targetstr[ix].indexOf("_parent")>-1)){eval("parent.window.location='"+linkstr[ix]+"'");}else if((targetstr[ix].indexOf("_top")>-1)){eval("top.window.location='"+linkstr[ix]+"'");}else{window.open(''+linkstr[ix],''+targetstr[ix]);}}}function f1fffff(){lll=ll-1;if(lll<0){lll=3-1;}}function f1ff(){if((0==1)&&(thumbmouseic==1)){return;}Beklemedemi=1;llll=lll;if(0==1){ffffffffffffff();}fffffffffffff();Sonraki();var ekbekleme=0;if(IEB){ekbekleme=parseInt(1000*6);}else{ekbekleme=0;}if(llllllll==1){if(!((ReachedTheEnd==1)&&(1==0))){if(tam==0){if(ll1lllllll==0){devam("f1ffff",(ekbekleme+4000));}}else{if(ll1lllllll==0){ll1ll=setTimeout('slide1.f1ffff()',(ekbekleme+4000));}} }else{ll1ll=setTimeout("slide1.ff1ffff()",4000);}}}function f1fff(){op=op-dif;op=(Math.floor(op*100))/100;if(op<(0.01)){op=0.00;}if(op>(0.99)){op=1.00;}lllllllllllll[ll].style.opacity = op;lllllllllllll[lll].style.opacity = 1.00-op;if(op>(0.00)){ll1ll=setTimeout('slide1.f1fff()',50);}else{lllllllllllll[ll].style.zIndex=2;lllllllllllll[lll].style.zIndex=3;f1ff();}}function f1ffff(){Beklemedemi=0;if(0==1){fffffffffffffff();}if(IEB){if(IEB==true){spageIcObj.filters[0].apply();}lllllllllllll[ll].style.visibility="hidden";lllllllllllll[lll].style.visibility="visible";if(IEB==true){spageIcObj.filters[0].play();}}else{op=1.00;lllllllllllll[ll].style.visibility="visible";lllllllllllll[lll].style.visibility="visible";lllllllllllll[ll].style.zIndex=3;lllllllllllll[lll].style.zIndex=2;lllllllllllll[ll].style.opacity = 1.00;lllllllllllll[lll].style.opacity = 1.00;f1fff();}}function f1fffffffffffffff(){Beklemedemi=0;if(0==1){fffffffffffffff();}lllll=lllll-Math.ceil(lllll/6);if(2==2){lllllllllllll[ll].style.left=""+(lllll-icwidth)+"px";lllllllllllll[lll].style.left=""+lllll+"px";}else if(2==3){lllllllllllll[ll].style.top=""+(lllll-icheight)+"px";lllllllllllll[lll].style.top=""+lllll+"px";}else if(2==4){lllllllllllll[ll].style.left=""+(icwidth-lllll)+"px";lllllllllllll[lll].style.left=""+lllll+"px";}else if(2==5){lllllllllllll[ll].style.top=""+(icheight-lllll)+"px";lllllllllllll[lll].style.top=""+lllll+"px";}if(lllll<=0){f1ffffffffffffff(trans_func_str);}else{ll1ll=setTimeout("slide1."+trans_func_str+"()",50);    }}function f1ffffffffffffff(fname){llll=lll;if(0==1){ffffffffffffff();}fffffffffffff();  Sonraki();if((2==0)||(2==1)){}else{if((2==3)||(2==5)){lllll=icheight;lllllllllllll[lll].style.top=""+lllll+"px";}else{lllll=icwidth;lllllllllllll[lll].style.left=""+lllll+"px"; }}if(2!=0){zindx();}Beklemedemi=1;if(llllllll==1){if(!((ReachedTheEnd==1)&&(1==0))){if(tam==0){if(ll1lllllll==0){devam(fname,4000);}}else{if(ll1lllllll==0){ll1ll=setTimeout('slide1.'+fname+'()',4000);}}}else{ll1ll=setTimeout('slide1.ff1ffff()',4000);}}}function ContinueSlideshow(){Beklemedemi=1;Sonraki();if((2==0)||(2==1)){}else{if((2==3)||(2==5)){lllll=icheight;lllllllllllll[lll].style.top=""+lllll+"px";}else{lllll=icwidth;lllllllllllll[lll].style.left=""+lllll+"px"; }}if((2!=0)&&(2!=1)){zindx();}if(llllllll==1){if(!((ReachedTheEnd==1)&&(1==0))){if(tam==0){if(ll1lllllll==0){devam("f1fffffffffffffff",50);}}else{if(ll1lllllll==0){ll1ll=setTimeout("slide1."+"f1fffffffffffffff"+"()",50);}} }else{ll1ll=setTimeout('slide1.ff1ffff()',50);}}}function Sonraki(){ll=lll;lll=lll+1;if(lll>=vnumbofimages){lll=0;ReachedTheEnd=1;}else{ReachedTheEnd=0;}      }function zindx(){lllllllllllll[lll].style.visibility="visible";lllllllllllll[ll].style.zIndex=2;lllllllllllll[lll].style.zIndex=3;    }function DoJustSwitch(){if(0==1){fffffffffffffff();}lllllllllllll[lll].style.visibility="visible";lllllllllllll[ll].style.visibility="hidden";f1ffffffffffffff(trans_func_str);}function f1f(c,n){ll=c;lll=n;if(2!=1){lllllllllllll[ll].style.visibility="visible";lllllllllllll[lll].style.visibility="visible";}lllllllllllll[ll].style.zIndex=2;lllllllllllll[lll].style.zIndex=3;}function ff1ffff(){if(ActionofLastImage==1){if(URLtoGo.length>3){if(URLtoGo.substring(0,11)=="javascript:"){eval(""+URLtoGo);return;}else{if(IEB){window.open(''+URLtoGo,'_self');}else{window.open(''+URLtoGo,'_self');}}}}}function devam(fm,pt){if((imgarr[lll].c==1)&&(imgarr[ll].c==1)){ll1ll=setTimeout('slide1.'+fm+'()',pt);}else{ll1ll=setTimeout('slide1.devam("'+fm+'",'+pt+')',4000);}var cagain=1;for(i=0;i<vnumbofimages;i++){if(imgarr[i].c==1){}else{cagain=0;}}if(cagain==1){tam=1;}}function ff1fffff(msec){if(tam==0){devam(trans_func_str,msec);}else{if(2==0){ll1ll=setTimeout("slide1.DoJustSwitch()",msec);}else if(2==1){ll1ll=setTimeout("slide1.f1ffff()",msec);}else{ll1ll=setTimeout("slide1.f1fffffffffffffff()",msec);}}}function ff1ffffff(){if(descgoster==1){ff1ff();}if(thumbgoster==1){CreateThumbnails();}for(i=0;i<3;i++){lllllllllllll[i]=document.getElementById("slide1d"+i);}if(0==1){f1fffffffffffff();}if(0==1){f1fffffffffff();}   if((0==1)||(0==1)||(0==1)||(0==1))   { f1ffffffffff();    }if(3>0){lllllllllllll[ll].style.visibility="visible";}if(3>1){ll=0;lll=0;llll=0;Sonraki();if(0==1){ffffffffffffff();}fffffffffffff();if(2==0){}else if(2==1){        }         else if(2==2)        {lllll=icwidth;lllllllllllll[lll].style.left=""+lllll+"px";zindx();                    }else if(2==3){lllll=icheight;lllllllllllll[lll].style.top=""+lllll+"px";zindx();            }          else if(2==4){lllll=icwidth;lllllllllllll[lll].style.left=""+lllll+"px";zindx();            }    else if(2==5){lllll=icheight;lllllllllllll[lll].style.top=""+lllll+"px";zindx();            }else if(2==6){zindx();}if(ll1lllllll==0){ff1fffff(4000);}}}function ff1fffffff(){spageObj = DisObj.appendChild(document.createElement("DIV"));spageObj.style.position="relative";spageObj.style.width=""+cwidth+"px";spageObj.style.height=""+cheight+"px";spageObj.style.overflow="hidden";spageObj.style.borderStyle=""+"solid";spageObj.style.borderWidth=""+1+"px";spageObj.style.borderColor="#"+"CCCCCC";if(0==1){spageObj.style.backgroundColor=""+"";}if(0==1){spageObj.style.backgroundImage="";spageObj.style.backgroundRepeat="no-repeat";spageObj.style.backgroundPosition=""+0+"px "+0+"px";}spageObj.style.visibility="inherit";if((0==1)||(0==1)||(0==1)||(0==1)){spageObj.onmouseover=ff1ffffffff;spageObj.onmouseout=ff1fffffffff;}spageIcObj = spageObj.appendChild(document.createElement("DIV"));spageIcObj.style.position="relative";spageIcObj.style.width=""+icwidth+"px";spageIcObj.style.height=""+icheight+"px";spageIcObj.style.overflow="hidden";spageIcObj.style.margin="0px";spageIcObj.style.padding="0px";spageIcObj.style.zIndex=(0+1);if(IEB==true){spageIcObj.style.filter='';spageIcObj.onfilterchange=f1ff;}dstr1='<div id="';dstr2='" style="position:absolute;visibility:hidden;left:0px;top:0px;padding:0px;margin:0px;overflow:hidden;">';dstr23='<table cellspacing="0" cellpadding="0" style="position:relative;left:0px;top:0px;padding:0px;margin:0px;"><tr><td style="width:'+icwidth+'px;height:'+icheight+'px;left:0px;top:0px;padding:0px;margin:0px;text-align:'+'center'+';vertical-align:'+'middle'+';">';dstr3='<img id="img';dstr4='" src="';dstr5='"  border="0" style="position:relative;'+'left:0px;top:0px;'+'border-style:'+'solid'+';border-width:'+'0'+'px;border-color:'+'#CCCCCC'+';'+'width:'+icwidth+'px;height:'+icheight+'px;'+'" alt=""></img>';dstr56='</td></tr></table>';dstr6='</div>';i=0;innertxt="";lnkstr="";lnkstrclose="";for(i=0;i<3;i++){if(linkstr[i].length>2){lnkstr='<a href="'+linkstr[i]+'" target="'+targetstr[i]+'" style="text-decoration: none;">';lnkstrclose="</a>";}else{lnkstr='';lnkstrclose='';}innertxt=innertxt+dstr1+"slide1d"+i+dstr2+dstr23+lnkstr+dstr3+i+dstr4+imgstr[i]+dstr5+lnkstrclose+dstr56+dstr6;}spageIcObj.innerHTML=""+innertxt;setTimeout('slide1.ff1ffffff()',100);}function Bas(){DisObj=document.getElementById('slide1sodis');if(!DisObj){setTimeout('slide1.Bas()',200);return;}        ff1fffffff();}var imgarr=new Array();var imgstr=new Array();var linkstr=new Array();var targetstr=new Array();var titarr=new Array();var desarr=new Array();var thumbimgstr=new Array();var thumbtextarr=new Array();imgarr[0]=new Image();imgarr[0].c=0;imgarr[0].onload = secondcomplate;imgarr[0].src=slide1foldername+'accom_roomdetail_deluxe_king.jpg';imgstr[0]=slide1foldername+'accom_roomdetail_deluxe_king.jpg';thumbimgstr[0]=slide1foldername+'accom_roomdetail_deluxe_king.jpg';linkstr[0]='';targetstr[0]="";titarr[0]="";desarr[0]="";thumbtextarr[0]="";imgarr[1]=new Image();imgarr[1].c=0;imgarr[1].onload = secondcomplate;imgarr[1].src=slide1foldername+'HotelGuangzhoudeluxeSingleRoom.jpg';imgstr[1]=slide1foldername+'HotelGuangzhoudeluxeSingleRoom.jpg';thumbimgstr[1]=slide1foldername+'HotelGuangzhoudeluxeSingleRoom.jpg';linkstr[1]='';targetstr[1]="";titarr[1]="";desarr[1]="";thumbtextarr[1]="";imgarr[2]=new Image();imgarr[2].c=0;imgarr[2].onload = secondcomplate;imgarr[2].src=slide1foldername+'superior room.JPG';imgstr[2]=slide1foldername+'superior room.JPG';thumbimgstr[2]=slide1foldername+'superior room.JPG';linkstr[2]='';targetstr[2]="";titarr[2]="";desarr[2]="";thumbtextarr[2]="";var spageObj=null;var spageIcObj=null;var llllllllllllll = new Array();var lllllllllllllll = new Array();var ThumbContArr = new Array();var lll1llArr = new Array();var ThumbCurtainImgArr = new Array();var lllllllllllll = new Array();var lllllll=0;var llllllll=1;var descgoster=0;var thumbgoster=1;var ll1lllllll=0;var ActionofLastImage=0;var URLtoGo="";var moving_obj=null;var DisObj=null;var lll1llllllllll=null;var ll1ll=null;var ll=0;var lll=0;var llll=0;var Beklemedemi=1;var ReachedTheEnd=0;var llllll=0;var CY=0;var Art=0;var ll1l=null;var Tutyy=0;var Kalan=0;var TutFark=0;var ll1llllllllll=0;var ThumbScrollReason=0;var tam=0;var lllll=0;var ll1llllllllllll=null;var l1l=null;var l1ll=null;var l1lll=null;var l1llll=null;var IsManualAction=0;var DescCalcWidth=0;var ll1lllllllll=0;var DesAnimTimer=null;var ll1llllllll=2;var vnumbofimages=3;var varrrplc=null;var ll1lll=200;var ll1llll=200;var lllllllll=0;var llllllllll=0;var lllllllllll=0;var llllllllllll=0;var MoveIcWidth=0;var MoveIcHeight=0;var TBW=0;var thumbmouseic=0;var stepc=parseInt(20*(6));var dif=0.00;var op=1.00;dif=(1.00/stepc);var currstep=20;var stepcount=20;var ll1lllll=100;var ll1llllll=1.0;var BottomClip=0;var XStep=0;var YStep=0;var stepsay=0;var cwidth=0;var cheight=0;if((IEB==true)&&(scompat == "BackCompat" )){    cwidth=427;    cheight=320;}else{    cwidth=427-2*(1);    cheight=320-2*(1);}var icwidth=427-2*(1);var icheight=320-2*(1);var bgd=0;var trans_func_str="f1fffffffffffffff";if(thumbgoster==1){this.CreateThumbnails=CreateThumbnails;this.ff=ff;this.fff=fff;this.ffff=ffff;this.fffff=fffff;this.ffffff=ffffff;this.fffffff=fffffff;this.ffffffff=ffffffff;this.fffffffff=fffffffff;this.ffffffffff=ffffffffff;this.fffffffffff=fffffffffff;this.ffffffffffff=ffffffffffff;this.fff1f=fff1f;this.fff1=fff1;this.thumbjustswitch=thumbjustswitch;}if(0==1){this.ff1ff=ff1ff;this.ffffffffffffff=ffffffffffffff;this.fffffffffffffff=fffffffffffffff;this.ffffffffffffffff=ffffffffffffffff;this.fffffffffffffffff=fffffffffffffffff;this.ff1f=ff1f;}if((0==1)||(0==1)||(0==1)||(0==1)){this.f1ffffff=f1ffffff;this.f1fffffff=f1fffffff;this.f1ffffffff=f1ffffffff;this.f1fffffffff=f1fffffffff;this.f1ffffffffff=f1ffffffffff;this.ff1ffffffff=ff1ffffffff;this.ff1fffffffff=ff1fffffffff;}this.fffffffffffff=fffffffffffff;this.ff1fff=ff1fff;this.f1f=f1f;this.f1ff=f1ff;this.f1fff=f1fff;this.f1ffff=f1ffff;this.f1fffff=f1fffff;this.f1fffffffffff=f1fffffffffff;this.f1ffffffffffff=f1ffffffffffff;this.f1fffffffffffff=f1fffffffffffff;this.devam=devam;this.f1ffffffffffffff=f1ffffffffffffff;this.Sonraki=Sonraki;this.zindx=zindx;this.f1fffffffffffffff=f1fffffffffffffff;this.ff1ffff=ff1ffff;this.ff1fffff=ff1fffff;this.ff1ffffff=ff1ffffff;this.ff1fffffff=ff1fffffff;this.Bas=Bas;this.DoJustSwitch=DoJustSwitch;this.ContinueSlideshow=ContinueSlideshow;}document.write("<div id=\"slide1sodis\"></div>");slide1=new slide1ScSlideShow();slide1.Bas();