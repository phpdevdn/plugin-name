(function($){
	$.fn.myCarousel=function(opts){
		var defaults={

		}
		var params=$.extend(defaults,opts);
		this.each(function(index){
		var $wrap = $(this),
			$img_blk=$wrap.children('.car-images'),
			$pos_blk=$wrap.children('.car-pos'),
			$dir_blk=$wrap.children('.car-direct'),
			$pos_li='',
			$img=$img_blk.children('.car-img'),
			$prev=$dir_blk.children('.prev'),
			$next=$dir_blk.children('.next'),
			wid_wrap='';
			num_img='',
			wid_img='',
			wid_int='',
			num_pos='',
			wid_move='';
		var listend = function(){
			$prev.on('click',{'dir' : 0},move);
			$next.on('click',{'dir' : 1},move);
			$pos_blk.on('click','li',function(){
				move_pos($(this));
			});
			$(window).on('resize',function(){
  					setup();
 			});
		}
		var move_pos = function($pos_drt){
 			var pos_act=$pos_li.attr('data-pos');
			var pos_clk=$pos_drt.attr('data-pos');
			if(pos_act==pos_clk){ return false; }
			var inc =(pos_act < pos_clk)? '-=' : '+=';
			var width=Math.abs(wid_wrap * (pos_act-pos_clk));
			$pos_li=$pos_drt;
			run(inc,width);
		}
		var move =function(event){
			event.preventDefault();
			var $pos_reset='';
			var direct=event.data.dir;
			if((direct==0 && $pos_li.attr('data-pos')==1) || (direct==1 && $pos_li.attr('data-pos')==num_pos)){
 				$pos_reset=(direct==0)? $pos_blk.children('li:last-child') : $pos_blk.children('li:first-child');
 			} else {
  				$pos_reset=(event.data.dir == 0) ? $pos_li.prev() : $pos_li.next();
 			}
 			move_pos($pos_reset);	
			 		
		}
		var run = function(data,data_w){
			$img_blk.animate({
				'left':data+data_w,
				},700,'swing',function(){});
			$pos_blk.children().removeClass('active');			
			$pos_li.addClass('active');
  			
		}
		var setup = function(){
			wid_wrap=$wrap.width();
			num_img=$img.size();
			wid_img=$img.width(),
			wid_int=Math.floor(wid_wrap / wid_img) * wid_img;
			num_pos=Math.ceil(num_img / Math.ceil(wid_wrap / wid_img));
			wid_move=0;
			console.log(wid_wrap+'/'+wid_img+'/'+num_img+'/'+num_pos);	
			$pos_blk.empty();		
			for(var i=1;i <= num_pos; i++){
				var li_pos=$('<li></li>').addClass((i==1)? 'active' : '')
							.attr({ 'data-pos' : i});
				$pos_blk.append(li_pos);
			}
			$pos_li=$pos_blk.children('li:first-child');
 		}

		setup();
		listend();
 		});
	}
})(jQuery);