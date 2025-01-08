$(function(){let default_min=boostingRule[0][0]
let default_max=boostingRule[boostingRule.length-1][0]
let start_level=boostingRule[0][0]
let end_level=boostingRule[boostingRule.length-1][0]
let default_step=1
_init()
$('.goods_boosting .goodItem').attr('goodsNo',boostingGoods.data.goods_no)
$('.goods_boosting .goodItem').attr('gameSku',boostingGoods.data.game_sku)
$('.goods_boosting .goodItem').attr('data-title',boostingGoods.data.title)
$('.boost_type_3 .boost_select-warp .select_value').on('click',function(){$(this).siblings('.select_list').toggleClass('show')})
$('.boost_type_3 .boost_select-warp .select_list .list_item').on('click',function(){$(this).addClass('active').siblings().removeClass('active')
var select_value=$(this).attr('data-title')
let price=$(this).attr('data-price')
$(this).parents('.boost_select-warp').find('.select_value p').text(select_value)
if(price&&price>0){$(this).parents('.boost_select-warp').find('.select_value .price').show().attr('lkr',price)}else{$(this).parents('.boost_select-warp').find('.select_value .price').hide()}
totalPrice()})
$('.boost_type_4 .boost_list .list_item').on('click',function(){$(this).addClass('active').siblings().removeClass('active')
totalPrice()})
$('.boost_type_2 .boost_list .list_item').on('click',function(){$(this).toggleClass('active')
totalPrice()
if($(this).parents('.boost_common_item').hasClass('boost_isShowRule')){if($(this).hasClass('active')){$('.boost_range').removeClass('rangHide')}else{$('.boost_range').addClass('rangHide')}}})
$('.boost_isShowRule .boost_list .list_item').on('click',function(){totalPrice()})
$('.goods_boosting .boost_range .range-slider').on('blur',function(){let parentDom=$(this).parents('.boost_range')
if(parentDom.hasClass('boost_two_range')){var valueArr=$(this).val().split(',');if(valueArr[0]==''||valueArr[1]==''||valueArr[0]==0||valueArr[1]==0){return false;}
if(valueArr[0]==valueArr[1]&&valueArr[0]!=1){parentDom.find('.level_min input').val(valueArr[1]-1);parentDom.find('.level_max input').val(valueArr[1]);}else if(valueArr[0]==valueArr[1]&&valueArr[0]==1){parentDom.find('.level_min input').val(valueArr[0]);parentDom.find('.level_max input').val(2);}else{parentDom.find('.level_min input').val(valueArr[0]);parentDom.find('.level_max input').val(valueArr[1]);}}else{parentDom.find('.level_max input').val($(this).val());}
$('.boost_remark').each(function(){if($(this).find('.remark_rulegrade').length>0){let level_max=$(this).find('.remark_rulegrade').val().split('-')[1]
let level_min=$(this).find('.remark_rulegrade').val().split('-')[0]
if(parseFloat($('.boost_range .level_max input').val())<parseFloat(level_min)){if($(this).hasClass('boost_type_3')){$(this).hide()
$(this).find('.list_item').eq(0).click()}else{$(this).hide().find('.list_item').removeClass('active')}}else{$(this).show()}}})
totalPrice()});$('.goods_boosting .boost_range').on('blur','.level_min input',function(){var val=$(this).val();var max=$(this).parents('.level_min').siblings('.level_max').find('input').val();if(parseFloat(val)>parseFloat(max)){$(this).val(max-1);}
if(parseFloat(val)<start_level||val==''){$(this).val(start_level);}
$(this).parents('.boost_range').find('.range-slider').jRange('setValue',''+$(this).val()+','+max+'');});$('.goods_boosting .boost_range').on('blur','.level_max input',function(){var val=$(this).val();var min=$(this).parents('.level_max').siblings('.level_min').find('input').val();if($(this).parents('.boost_range').hasClass('boost_one_range')){if(parseFloat(val)<parseFloat(min)||val==''){$(this).val(parseFloat(min));}
if(parseFloat(val)>default_max){$(this).val(default_max);}
$(this).parents('.boost_range').find('.range-slider').jRange('setValue',$(this).val());}else{if(parseFloat(val)>default_max){$(this).val(default_max);}
if(parseFloat(val)==parseFloat(min)){$(this).val(parseFloat(min)+1);}
$(this).parents('.boost_range').find('.range-slider').jRange('setValue',''+min+','+$(this).val()+'');}});$('body').on('click',function(e){if(!$('.boost_type_3 .boost_select-warp .select_value').is(e.target)&&$('.boost_type_3 .boost_select-warp .select_value').has(e.target).length===0){$('.boost_type_3 .boost_select-warp .select_list').removeClass('show')}});function _init(){flexOrder()
remarkPriceInit()
speedPriceInit()
rangeInit()
totalPrice()}
function flexOrder(){$('.boost_common_item').each(function(){let index=$(this).attr('data-index')
$(this).css('order',index)})}
function speedPriceInit(){$('.boost_common_item[data-type=speed] .list_item').each(function(){let title=$(this).attr('data-title')
boostingSpeed.forEach(item=>{if(item[0]==title){$(this).attr('data-time',item[2])
$(this).attr('data-discount',item[1])}})})}
function remarkPriceInit(){let currentRemark=[]
if($('.defaultSelect_remark').length>0){$('.defaultSelect_remark').each(function(){currentRemark.push($(this).val())})}
$('.boost_common_item[data-type=remark] .list_item').each(function(){let title=$(this).attr('data-title')
boostingRemark.forEach(item=>{if(item[0]==title){$(this).attr('data-time',item[2])
$(this).attr('data-price',item[1])
if(item[1]>0){$(this).find('.price_content').removeClass('hide').find('.price').attr('lkr',item[1])}}})
if(currentRemark.indexOf(title)!=-1){$(this).addClass('active')}})
$('.boost_common_item[data-type=remark].boost_type_3').each(function(){if($(this).find('.list_item.active').attr('data-price')&&$(this).find('.list_item.active').attr('data-price')>0){let price=$(this).find('.list_item.active').attr('data-price')
$(this).find('.select_value .price').show().attr('lkr',price)}else{$(this).find('.select_value .price').hide()}})}
function rangeInit(){if($('.boost_range').length==1){if($('.range_default').length>0){$('.range_default').each(function(){let title=$(this).val().split(':')[0]
let val=$(this).val().split(':')[1]
if(title=='def_min'){start_level=val}
if(title=='def_max'){end_level=val}
if(title='step'){default_step=val}
if(title='min'){default_min=val}})}
if($('.rulegrade').length>0){start_level=$('.rulegrade').val().split('-')[0]
end_level=$('.rulegrade').val().split('-')[1]
default_min=$('.rulegrade').val().split('-')[0]
default_max=$('.rulegrade').val().split('-')[1]}
if($('.rulestep').length>0){default_step=$('.rulestep').val().split(':')[1]}
if($('.boost_two_range').length>0){$('.range-slider').jRange({from:parseFloat(default_min),to:parseFloat(default_max),step:parseFloat(default_step),scale:[parseFloat(default_min),parseFloat(default_max)],format:'%s',width:'100%',showLabels:true,isRange:true});$('.range-slider').jRange('setValue',start_level+','+end_level);$('.goods_boosting .boost_range .level_min input').val(start_level);$('.goods_boosting .boost_range .level_max input').val(end_level);}else{default_min=boostingRule[0][0]
$('.range-slider').jRange({from:parseFloat(start_level),to:parseFloat(end_level),step:parseFloat(default_step),scale:[parseFloat(default_min),parseFloat(default_max)],format:'%s',width:'100%',showLabels:true,showScale:true});$('.range-slider').jRange('setValue',start_level);$('.goods_boosting .boost_range .level_min input').val(default_min);$('.goods_boosting .boost_range .level_max input').val(start_level);}}
if($('.boost_isShowRule').length>0){if($('.boost_isShowRule .list_item.active').length==0){$('.boost_range').addClass('rangHide')}else{$('.boost_range').removeClass('rangHide')}}}
function priceCalc(){var price=$('.goods_boosting .price');var rate=localStorage['rate'];price.each(function(){var lkr=$(this).attr('lkr');var num=1;var newLkr=num*lkr;var price=(newLkr*rate).toFixed(2);$(this).find('i').text(price);$(this).find('strong').text(localStorage['symbol']);});}
function totalPrice(){let rangPrice=0;let rangeTime=0;if($('.boost_range').length==1&&$('.boost_otherRange').length==0){let max_price=0;let max_time=0;let min_price=0;let min_time=0;for(var i=0;i<boostingRule.length;i++){if(boostingRule[i][0]==$('.boost_range .level_min input').val()){min_price=boostingRule[i][1];min_time=boostingRule[i][2];}
if(boostingRule[i][0]==$('.boost_range .level_max input').val()){max_price=boostingRule[i][1];max_time=boostingRule[i][2];}}
rangPrice=(parseFloat(max_price)-parseFloat(min_price));rangeTime=(parseFloat(max_time)-parseFloat(min_time));if($('.boost_range').hasClass('rangHide')){rangPrice=0;rangeTime=0;}}
let speedPrice=0;let remarkPrice=0;let speedTime=0;let remarkTime=0;let contactSpeedPrice=rangPrice;let contactSpeedTime=rangeTime;let isSpeed=[];let rangeAsRemark=false;$('input.remarkAsSpeed').each(function(){isSpeed.push($(this).val())})
$('.boost_common_item[data-type=remark] .list_item.active').each(function(){if(typeof $(this).attr('data-price')!='undefined'){remarkPrice+=parseFloat($(this).attr('data-price'))
remarkTime+=parseFloat($(this).attr('data-time'))}})
if(isSpeed.length>0){$('.boost_common_item[data-type=remark]').each(function(){if(isSpeed.indexOf($(this).find('.boost_title').text())!=-1){$(this).find('.list_item.active').each(function(){contactSpeedPrice+=parseFloat($(this).attr('data-price'))
contactSpeedTime+=parseFloat($(this).attr('data-time'))})}})}
$('.boost_common_item[data-type=speed] .list_item').each(function(){if($(this).attr('data-discount')!=1){$(this).find('.price_content').removeClass('hide')
$(this).find('.price').attr('lkr',(contactSpeedPrice*$(this).attr('data-discount'))-contactSpeedPrice)}
if($(this).attr('data-time')&&$(this).attr('data-time')>0){$(this).attr('cur_time',(contactSpeedTime*$(this).attr('data-time'))-contactSpeedTime)}
if($(this).hasClass('active')){speedPrice+=parseFloat($(this).find('.price').attr('lkr'))
speedTime+=parseFloat($(this).attr('cur_time'))}})
if($('.boost_otherRange').length>0){$('input.rulegrade').length>0?rangeAsRemark=true:rangeAsRemark=false}
let totalTime=speedTime+rangeTime+remarkTime
if(rangeAsRemark){totalTime=totalTime*$('.boost_otherRange .level_max input').val()}
if(totalTime==0){$('.goods_time').hide()}else{$('.goods_time').show()}
if(totalTime>24){var day=Math.floor(totalTime/24);var hour=Math.ceil(totalTime%24);if(hour==0){$('.goods_time p span').text(day+' DAYS');}else{$('.goods_time p span').text(day+' DAYS '+hour+' HOURS');}}else{if(totalTime<1){$('.goods_time p span').text(Math.floor(totalTime*60)+' MINUTES');}else{var hour=Math.floor(totalTime);var minute=Math.floor((totalTime-hour)*60);if(minute==0){$('.goods_time p span').text(hour+' HOURS');}else{$('.goods_time p span').text(hour+' HOURS '+minute+' MINUTES');}}}
let totalPrice=speedPrice+remarkPrice+rangPrice;if(rangeAsRemark){totalPrice=totalPrice*$('.boost_otherRange .level_max input').val()}
$('.goods_boosting .priceBox .price').attr('lkr',totalPrice)
if(totalPrice==0){$('.goods_boosting .buyShopBtn .boost_btn').addClass('no').attr('disabled','disabled');}else{$('.goods_boosting .buyShopBtn .boost_btn').removeClass('no').attr('disabled',false);}
priceCalc()}
$('.goods_server').on('click','.goods_select_list .list_item:not(.active)',function(){$(this).addClass('active').siblings().removeClass('active');if($('.goods_server_child.show ul li.active').length>0){var index=$('.goods_server_child.show ul li.active').index();$('.goods_server_child[serverid='+$(this).attr('serverid')+']').addClass('show').siblings('.goods_server_child').removeClass('show');$('.goods_server_child.show ul li').eq(index).addClass('active').siblings('li').removeClass('active');}else{$('.goods_server_child[serverid='+$(this).attr('serverid')+']').addClass('show').siblings('.goods_server_child').removeClass('show');}
getData();});function getData(){$('.boost__nodata').remove();let server_id=$('.goods_server .goods_select_list .list_item.active').attr('serverid');if($('.goods_server_child.show ul li.active').length>0){server_id=$('.goods_server_child.show ul li.active').attr('childserverid');}
$.ajax({url:siteUrl+'/goods/goods_ajax',type:'get',dataType:'json',data:{template_type:'boosting',server_id:server_id,cate_id:0,game_sku:goods_game_sku},beforeSend:function(){$('.goods_mask').css('display','flex');},success:function(res){$('.goods_mask').hide();if(typeof res.data.goods_no=='undefined'){$('.boostingData .hasData').append('<div class="boost__nodata">Out of Stock !</div>');return false;}
boostingRule=res.data.rule
boostingRemark=res.data.remark
boostingSpeed=res.data.speed
_init()
$('.goods_boosting .goodItem').attr('goodsNo',res.data.goods_no);$('.goods_boosting .goodItem').attr('gameSku',res.data.game_sku);$('.goods_boosting .goodItem p.title').text(res.data.title);},error:function(error){$('.goods_mask').hide();$('.boostingData .hasData').append('<div class="boost__nodata">Out of Stock !</div>');}});}
$('.box__Box-sc-tiy18e-0.fcCMmP div[role=button]').click(function(){let id=$(this).attr('id')
$('.box__Box-sc-tiy18e-0.fcCMmP div[aria-labelledby='+id+']').toggleClass('open')})
$('.box__Box-sc-tiy18e-0.fasjEx div[role=button]').click(function(){let id=$(this).attr('id')
$('.box__Box-sc-tiy18e-0.fasjEx div[aria-labelledby='+id+']').toggleClass('open')})
$('body').on('click','.mb-l div[role=button]',function(){let id=$(this).attr('id')
$('.mb-l div[aria-labelledby='+id+']').toggleClass('open')})})