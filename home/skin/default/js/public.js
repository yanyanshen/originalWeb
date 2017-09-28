    //分类菜单二级菜单动画效果
	function show(thisdl){
         thisdl.lastChild.style.display="block";
	}
	function hid(thisdl){
		thisdl.lastChild.style.display="none";
	}
//返回顶部JS效果
    window.onscroll=function(){
    	var goTop=document.getElementById('goTop');
    	var sTop=document.documentElement.scrollTop ||document.body.scrollTop;   	
    	if(sTop>0){
			goTop.style.display="block"
    	}else{
    		goTop.style.display="none"
    	}    	
    }