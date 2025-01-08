$(function(){if($('.breadcrumb .category a span').text()==localStorage['game_name']){$('.server.device-server ul.active li').eq(localStorage['game_index']).addClass('active').siblings('li').removeClass()}
$('.goods-list img').lazyload({threshold:500})
$('.parent-cate ul li').click(function(){if($(this).hasClass('active')){return false;}
$('.child-cate').removeClass('active')
$('.child-cate ul li').removeClass('active')
$(this).find('input').prop('checked','checked')
$(this).addClass('active').siblings('li').removeClass('active')
var id=$(this).attr('data-cate-id')
$('.child-cate[data-cate-id='+id+']').addClass('active')
$('.child-cate[data-cate-id='+id+'] ul li').eq(0).addClass('active').siblings('li').removeClass('avtive')
$('.child-cate[data-cate-id='+id+'] ul li').eq(0).find('input').prop('checked','checked')
ajaxList()
selectTitle()
if($(window).width()+8<=1024){var goodsHeight=$('.goods').offset().top-$('.fixed-header').height();$('html,body').animate({scrollTop:goodsHeight-4},300);}})
$('.child-cate ul li').click(function(){if($(this).hasClass('active')){return false;}
$(this).find('input').prop('checked','checked')
$(this).addClass('active').siblings('li').removeClass('active')
ajaxList()
selectTitle()})
$('.child-server ul li').click(function(){if($(this).hasClass('active')){return false;}
$(this).find('input').prop('checked','checked')
$(this).addClass('active').siblings('li').removeClass('active')
ajaxList()
var text=$(this).find('p').text()
var devicetext='';var servertext='';if($('.device.device-server ul li').length>1){$('.device.device-server').show()
devicetext=$('.device.device-server ul li.active').text()}
if($('.server.device-server ul li').length>1){servertext=$('.server.device-server ul li.active').text()}
if(devicetext==''){$('.goods-header h2 p').text(servertext+' - '+text)}else{$('.goods-header h2 p').text(devicetext+' - '+servertext+' - '+text)}
if($(this).parents('.child-server').find('.child-server-select').length>0){var goodsHeight=$('.goods').offset().top-$('.fixed-header').height()
$('html,body').animate({scrollTop:goodsHeight-4},300);}})
$('.device-server.device').on('click','li',function(){if($(this).hasClass('active')){return false;}
var index=$(this).index()
$(this).addClass('active').siblings('li').removeClass('active')
$('.device-server.server ul').eq(index).addClass('active').siblings('ul').removeClass('active')
serverSelect()
if($('.device-server.server ul').eq(index).text().trim()==''){$('.device-server.server').hide()}else{$('.device-server.server').show()}
cateSelect()
ajaxList()
selectTitle()})
$('.device-server.server').on('click','li',function(){if($(this).hasClass('active')){return false;}
$(this).addClass('active').siblings('li').removeClass('active')
serverSelect()
ajaxList()
selectTitle()})
function serverSelect(){var id=$('.server.device-server ul.active li.active').attr('data-id')
if($('.child-server[data-id='+id+'] ul li').length==0){$('.child-server').removeClass('active')}else{$('.child-server[data-id='+id+']').addClass('active').siblings('.child-server').removeClass('active')
$('.child-server[data-id='+id+'] ul li').eq(0).addClass('active').siblings('li').removeClass('active')
$('.child-server[data-id='+id+'] ul li').eq(0).find('input').prop('checked','checked')}}
cateSelect()
function cateSelect(){var id=$('.device.device-server li.active').attr('data-device_id')
if($('.parent-cate[data-device_id='+id+'] ul li').length==0){$('.parent-cate').removeClass('active')}else{$('.parent-cate[data-device_id='+id+']').addClass('active').siblings('.parent-cate').removeClass('active')
$('.parent-cate[data-device_id='+id+'] ul li').eq(0).addClass('active').siblings('li').removeClass('active')
$('.parent-cate[data-device_id='+id+'] ul li').eq(0).find('input').prop('checked','checked')
var pid=$('.parent-cate.active ul li.active').attr('data-cate-id')
$('.child-cate').removeClass('active')
$('.child-cate[data-cate-id='+pid+']').addClass('active')
$('.child-cate[data-cate-id='+pid+'] ul li').eq(0).addClass('active').siblings('li').removeClass('active')
$('.child-cate[data-cate-id='+pid+'] ul li').eq(0).find('input').prop('checked','checked')}}
selectTitle()
function selectTitle(){var totalText='';var devicetext='';var servertext='';var catetext='';if($('.device.device-server ul li').length==1&&$('.server.device-server ul li').length==0&&$('.parent-cate.active').length==0){$('.goods-header h2 p').hide()
$('.goods-header h2 span').hide()
$('.goods-header').css('justify-content','flex-end')}else{$('.goods-header h2 p').show()
$('.goods-header h2 span').css('display','block')}
if($('.device.device-server ul li').length<=1){$('.device.device-server').hide()}else{$('.device.device-server').show()
devicetext=$('.device.device-server ul li.active').text()}
if($('.server.device-server ul.active li').length<=1){$('.server.device-server').hide()}else{$('.server.device-server').show()
servertext=$('.server.device-server ul.active li.active').text()
serverSelect()}
if($('.child-server.active').length>0){if($('.server.device-server ul li').length<=1){}else{servertext+=' - ';}
servertext+=$('.child-server.active ul li.active p').text()}
if($('.parent-cate.active ul li.active').length>0){catetext=$('.parent-cate.active ul li.active p').text()}
if($('.child-cate.active ul li.active').length>0){if($('.parent-cate.active ul li.active').length>0){catetext+=' - '}
catetext+=$('.child-cate.active ul li.active p').text()}
if(devicetext!=''){if(servertext!=''){if(catetext!=''){totalText=devicetext+' - '+servertext+' - '+catetext}else{totalText=devicetext+' - '+servertext}}else{if(catetext!=''){totalText=devicetext+' - '+catetext}else{totalText=devicetext}}}else{if(servertext!=''){if(catetext!=''){totalText=servertext+' - '+catetext}else{totalText=servertext}}else{totalText=catetext}}
$('.goods-header h2 p').text(totalText)}
function ajaxList(clickType='click'){var cate_id=0;var sort=0;var server_id=$('.server.device-server ul.active input').attr('data-id');if($('.server.device-server ul.active li.active').length>0){server_id=$('.server.device-server ul.active li.active').attr('data-id')}
if($('.child-server.active ul li.active').length>0){server_id=$('.child-server.active ul li.active').attr('data-id')}
if($('.parent-cate.active ul li.active').length>0){cate_id=$('.parent-cate.active ul li.active').attr('data-cate-id')}
if($('.child-cate.active ul li.active').length>0){cate_id=$('.child-cate.active ul li.active').attr('data-id')}
var goods_name='';if(clickType=='click'){$('.item-quick-search input').val('');searchFlag=false;}else{if($('.item-quick-search input').val()!=''&&searchFlag){goods_name=$('.item-quick-search input').val();cate_id=0;}}
var sort=0;if($('.goods__sort .sort__item.active').length>0){sort=$('.goods__sort .sort__item.active').attr('data-sort');}
$('.goods-list .noDataTips').hide()
$('.goods-list ul').html('')
$('.spinner').show()
$('.item-quick-search input').val('')
$.ajax({url:siteUrl+'/goods/goods_ajax',type:'get',dataType:'json',data:{template_type:template_name,server_id:server_id,cate_id:cate_id,sort:sort,goods_name:goods_name,page:1},success:function(res){pageFlag=false;currentPage=1;$('.spinner').hide()
var data=res.data
if(template_name=='golds'){if(data.result_goods.length==0){$('.goods-list .noDataTips').show()}}else if(template_name=='items'){if(data.goods.length==0){$('.goods-list .noDataTips').show()}else{for(var i=0;i<data.goods.length;i++){data.goods[i].max=Math.ceil(2000/data.goods[i].true_price)}}
pageInit(res.data.count)
var url=default_siteHost+location.pathname;history.pushState({url:url,title:document.title},document.title,url)}
var html=template('itemHtml',data)
$('.goods-list ul').html(html)
$('.goods-list img').lazyload({threshold:300})
goodsPriceCalc()
good_rules=res.data.one_goods
if(template_name=='golds'&&res.data.one_goods.price){good_rules=res.data.one_goods;price_rules=good_rules.rule;price_rules.sort(function(x,y){return x[0]-y[0];});quickGoodsRule();$('.quick-search .count input').attr('disabled',false);}else{$('.quick-search .price').attr('lkr',0)
$('.quick-search .price i').text(0.00)
$('.quick-search .count input').attr('disabled',true)
$('.quick-search .count input').val('')}}})}
var currentPage=1;var pageFlag=false;var searchFlag=false;if(template_name=='items'){pageInit()}
function pageInit(count=$('#item_pager').attr('data-count')){$('#item_pager').pagination({pageCount:Math.ceil(count/30),coping:true,homePage:'<<',endPage:'>>',prevContent:'<',nextContent:'>',current:1,coping:true,callback:function(api){var cate_id=0;var server_id=$('.server.device-server ul.active input').attr('data-id');var goods_name=$('.quick-search .input-box input').val();if($('.server.device-server ul.active li.active').length>0){server_id=$('.server.device-server ul.active li.active').attr('data-id');}
if($('.parent-cate.active ul li.active').length>0){cate_id=$('.parent-cate.active ul li.active').attr('data-cate-id');}
if($('.child-cate.active ul li.active').length>0){cate_id=$('.child-cate.active ul li.active').attr('data-id');}
if(searchFlag){cate_id=0;$('.quick-search .search_ico').hide()
$('.quick-search .close_ico').show()}else{goods_name='';$('.quick-search .search_ico').show()
$('.quick-search .close_ico').hide()}
var tag='';if($('.tagCate ul li.active').attr('title')!=undefined){tag=$('.tagCate ul li.active').attr('title');}
var sort=0;if($('.goods__sort .sort__item.active').length>0){sort=$('.goods__sort .sort__item.active').attr('data-sort');}
$.ajax({url:siteUrl+'/goods/goods_ajax',type:'get',dataType:'json',data:{template_type:template_name,server_id:server_id,page:api.getCurrent(),goods_name:goods_name,game_sku:goods_game_sku,sort:sort,cate_id:cate_id},beforeSend:function(){$('.goods-list img').removeClass('lazy');$('.goods-list ul').html('')
$('.spinner').show();$('html,body').animate({scrollTop:$('.goods-header').offset().top-300},0);var url=default_siteHost+location.pathname+'?page='+api.getCurrent();history.pushState({url:url,title:document.title},document.title,url)},success:function(res){$('.spinner').hide();var data=res.data;if(data.goods.length>0){for(var i=0;i<data.goods.length;i++){data.goods[i].max=Math.ceil(2000/data.goods[i].true_price);}}
var html=template('itemHtml',data);$('.goods-list ul').html(html);$('.goods-list img.lazy').lazyload({threshold:1000});goodsPriceCalc();}});}})}
function goodsPriceCalc(){var rate=$('.header .lang-currency>p.curr-name').attr('data-rate')
var symbol=localStorage["symbol"]
var goods_price=$('.goods .goods-list .price')
goods_price.each(function(){var lkr=$(this).attr('lkr')
var num=$(this).parents('.item').find('input').val()
$(this).find('strong').text(symbol)
var newLkr=num*lkr
var price=(newLkr*rate).toFixed(2)
$(this).find('i').text(price)})}
$('.goods-list ul').on("mouseover","li",function(e){if($(window).width()+8>1024){var tips=$(this).find('.item-info').attr('data-tips');if(typeof tips!='undefined'){$(this).find('.item-info').html(tips);}
$(this).find('.item-info').addClass('display');}});$('.goods-list ul').on("mouseleave","li",function(e){if($(window).width()+8>1024){$(this).find('.item-info').removeClass('display');}});$('.goods-list ul').on("mouseover","li .item-info",function(e){if($(window).width()+8>1024){$(this).removeClass('display');}
e.stopPropagation();});$('.goods-list ul').on("click","li .item-img",function(e){$('.item-info').removeClass('display')
if($(window).width()<=1024){var tips=$(this).find('.item-info').attr('data-tips');if(typeof tips!='undefined'){$(this).find('.item-info').html(tips);}
$(this).parents('.item').find('.item-info').addClass('display');if(!$(this).find('.item-info').hasClass('display')){e.stopPropagation();}}});$('.goods-list ul').on("click","li .item-info",function(e){$(this).removeClass('display');e.stopPropagation();});$('.goods-list').on('click','.buy-now',function(){var that=$(this)
addCart(that)
let affiliate='';if($('#isAffiliate').length>0&&$('#isAffiliate').val()!=''){affiliate='?id='+$('#isAffiliate').val();}
else{affiliate=''}
window.location.href=siteUrl+'/cart'+affiliate;})
var timeOutList
$('.goods-list').on('click','.add-cart',function(e){$('.header .mobile_cart').removeClass('bounce');clearTimeout(timeOutList);var that=$(this);if($(window).width()+8<=1024){clearTimeout(mobileAnimate)
var src=$(this).parents('li').find('.item-img img').attr('data-original');let left=$('.mobile_cart').offset().left;let style=document.createElement('style');style.type='text/css';let keyFrames=`@keyframes flyCart {
                0% {
                  top: ${e.clientY}px;
                  left: ${e.clientX-50}px;
                }
                80% {
                    transform: scale(.8);
                }
                100% {
                  top: 5px;
                  left: ${left-10}px;
                  transform: scale(0);
                }
              }`;var html='<div class="addCartImg"><img src="'+src+'"/></div>';style.innerHTML=keyFrames;$('.footer').append(style);$('body').append(html);var mobileAnimate=setTimeout(()=>{addCart(that);$('.footer style').remove();$('.addCartImg').remove();},500);}else{addCart(that);$('.cart .cart-link').addClass('display');timeOutList=setTimeout(function(){$('.cart .cart-link').removeClass('display');},2000);}});$('.right .cart').hover(function(){clearTimeout(timeOutList)})
function addCart(that){$.cookie('game_sku',goods_game_sku)
if($('.server.device-server ul.active input').length>0){if($('.server.device-server ul.active li.active').length>0){var device_type=$('.server.device-server ul.active li.active').attr('value')}else{var device_type=$('.server.device-server ul.active input').val()}}else{if($('.server_c ul.active li.active').length>0){var device_type=$('.server_c ul.active li.active').attr('value')}else{var device_type=$('.server_c ul.active input').val()}}
if(localStorage['cart']&&localStorage['cart']!=''){if(device_type!=localStorage['cate_type']){localStorage.removeItem('cart')}}
var shopCart;if(localStorage['cart']&&localStorage['cart']!=''){datas=localStorage['cart']
shopCart=JSON.parse(decodeURIComponent(window.atob(localStorage.getItem("cart"))))}else{shopCart={}
shopCart.list=[]}
var goods={}
var type=0
if(template_name=='items'){for(var i=0;i<shopCart.list.length;i++){if(shopCart.list[i].goods_no==that.parents('li.item').attr('data-id')){type++
if(parseFloat(shopCart.list[i].num)+parseFloat(that.parents('li.item').find('.item-num input').val())<that.parents('li.item').find('.item-num input').attr('max')){shopCart.list[i].num=parseFloat(shopCart.list[i].num)+parseFloat(that.parents('li.item').find('.item-num input').val())}else{shopCart.list[i].num=that.parents('li.item').find('.item-num input').attr('max')}
break;}}
if($('.quick-search input').val().trim()==''){var serverTitle=$('.goods .goods-header h2 p').text()}else{let cate_id=that.parents('li.item').attr('cate_id')
var cateText=$('.parent-cate.active ul li[data-cate-id='+cate_id+'] p').text()
var serverTitle=$('.device-server.server ul.active li.active span').text()+'-'+cateText}
if(type==0){if(goods_game_sku=='poe898'||goods_game_sku=='pathofexile2862'){if($('.device-server.server ul.active li.active span').text().indexOf('XBOX')!=-1){goods.device_type='xbox'}else if($('.device-server.server ul.active li.active span').text().indexOf('PS4')!=-1){goods.device_type='ps'}else{goods.device_type='pc'}}
goods.goods_no=that.parents('li.item').attr('data-id')
goods.num=that.parents('li.item').find('.item-num input').val()
goods.step=that.parents('li.item').find('.item-num input').attr('data-num')
goods.max_num=that.parents('li.item').find('.item-num input').attr('max')
goods.title=serverTitle+' '+that.parents('li.item').find('.item-title').text()
goods.img=that.parents('li.item').find('.item-img img').attr('data-original')
goods.price=that.parents('li.item').find('.item-price .price').attr('lkr')
goods.game_sku=goods_game_sku
if(parseFloat(goods.num)==0||goods.num==''){return false;}
shopCart.list.unshift(goods)}}else if(template_name=='golds'){for(var i=0;i<shopCart.list.length;i++){if(shopCart.list[i].price_num==that.parents('li.item').attr('data-num')&&shopCart.list[i].goods_id==that.parents('li.item').attr('data-id')){type++;if(parseFloat(shopCart.list[i].num)+parseFloat(that.parents('li.item').find('.item-num input').val())<that.parents('li.item').find('.item-num input').attr('max')){shopCart.list[i].num=parseFloat(shopCart.list[i].num)+parseFloat(that.parents('li.item').find('.item-num input').val());}else{shopCart.list[i].num=that.parents('li.item').find('.item-num input').attr('max');}
break;}}
if(type==0){goods.device_type=$('.device.device-server ul li.active span').text();goods.goods_no=good_rules.goods_no;goods.goods_id=that.parents('li.item').attr('data-id');goods.num=that.parents('li.item').find('.item-num input').val();goods.price_num=that.parents('li.item').attr('data-num');goods.step=that.parents('li.item').find('.item-num input').attr('data-num');if(that.parents('li.item').attr('data-give')>0){goods.title=that.parents('li.item').find('.item-title').text();goods.give=that.parents('li.item').attr('data-give');}else{goods.title=that.parents('li.item').find('.item-title').text();}
goods.img=that.parents('li.item').find('.item-img img').attr('data-original');goods.price=that.parents('li.item').find('.item-price .price').attr('lkr');goods.game_sku=goods_game_sku;goods.max_num=999;if(parseFloat(goods.num)==0||goods.num==''){return false;}
shopCart.list.unshift(goods);}}else if(template_name=='orb'){for(var i=0;i<shopCart.list.length;i++){if(shopCart.list[i].goods_no==that.parents('.item').find('.item-amount').attr('data-id')){type++
if(parseFloat(shopCart.list[i].num)+parseFloat(that.parents('.item').find('.item-num input').val())<that.parents('.item').find('.item-slider .range-input').attr('max')){shopCart.list[i].num=parseFloat(shopCart.list[i].num)+parseFloat(that.parents('.item').find('.item-num input').val())}else{shopCart.list[i].num=that.parents('.item').find('.item-slider .range-input').attr('max')}
break;}}
if(type==0){if($('.device_c li.active span').text().indexOf('XBOX')!=-1){goods.device_type='xbox'}else if($('.device_c li.active span').text().indexOf('PS4')!=-1){goods.device_type='ps'}else{goods.device_type='pc'}
goods.goods_no=that.parents('.item').find('.item-amount').attr('data-id')
goods.num=that.parents('.item').find('.item-num input').val()
goods.step=that.parents('.item').find('.item-num input').attr('data-num')
goods.max_num=that.parents('.item').find('.item-slider .range-input').attr('max')
goods.title=that.parents('.item').find('.item-img p').text()
goods.img=that.parents('.item').find('.item-amount').attr('data-src')
goods.price=that.parents('.item').find('.item-price .price').attr('lkr')
goods.game_sku=goods_game_sku
if(parseFloat(goods.num)==0||goods.num==''){return false;}
shopCart.list.unshift(goods)}}else if(template_name=='boosting'){for(var i=0;i<shopCart.list.length;i++){if(shopCart.list[i].goods_no==$('.boosting_main .item-amount').attr('data-id')){type++
shopCart.list[i].num=1
break;}}
goods.goods_no=$('.boosting_main .item-amount').attr('data-id')
goods.num=1
goods.max_num=1
goods.title=$('.boosting_main .item-amount').attr('data-title')
goods.min_level=$('.boosting_main .item-level .level-1 input').val()
goods.max_level=$('.boosting_main .item-level .level-3 input').val()
goods.boost_type=true
let remarkTitle={}
if(!$('.boosting_main .item-option').hasClass('hide')&&$('.boosting_main .item-option li.active').length>0){let remark=[]
$('.item-option li.active').each(function(){let remarkObj={price:$(this).find('.price').attr('lkr'),title:$(this).find('p').text()}
remark.push(remarkObj)})
remarkTitle.remark=remark}
goods.remarkTitle=remarkTitle
goods.league=$('.item-leagues ul li.active').text()
goods.boostingType='poe'
goods.price=$('.boosting_main .c_orb_price .item-price .price').attr('lkr')
goods.game_sku=goods_game_sku
goods.img=$('.boosting_main .chaosorbGoods .item-img img').attr('src')
if(type==0){shopCart.list.unshift(goods)}}else if(template_name=='new_boosting'){let min_level=$('.boost_common_item .item-level .level-1 input').val();let max_level=$('.boost_common_item .item-level .level-3 input').val();for(var i=0;i<shopCart.list.length;i++){if(shopCart.list[i].goods_no==$('.boosting_main .goodItem').attr('goodsNo')){shopCart.list.splice(i,1);break;}}
goods.goods_no=$('.boosting_main .goodItem').attr('goodsNo');goods.num=1;goods.max_num=1;goods.title=$('.boosting_main .goodItem').attr('data-title');var remarkTitle={};remarkTitle.remark=[];remarkTitle.speed=[];$('.boost_common_item.boost_remark .list_item.active').each(function(){remarkTitle.remark.push({price:$(this).find('.price').attr('lkr'),title:$(this).attr('data-title')})})
$('.boost_common_item.boost_speed .list_item.active').each(function(){remarkTitle.speed.push({price:$(this).find('.price').attr('lkr'),title:$(this).attr('data-title')})})
if($('.boost_range').length==1&&$('.boost_otherRange').length==0&&!$('.boost_range').hasClass('rangHide')){goods.min_level=min_level;goods.max_level=max_level;}
if($('.boost_otherRange').length>0){goods.number=max_level
goods.isRange=true;}
if($('.boost_one_range').length>0){goods.boost_number=max_level
goods.isRange=true;}
goods.remarkTitle=remarkTitle;goods.boostingType=goods_game_sku;goods.price=$('.boosting_main .priceBox .truePrice .price').attr('lkr');goods.game_sku=goods_game_sku;goods.img=$('.boosting_main .chaosorbGoods .item-img img').attr('src');goods.boost_type=true;goods.server_id=$('.boosting_main .goods_server .list_item.active').attr('serverid');goods.server_title=$('.boosting_main .goods_server .list_item.active p').text();if($('.boosting_main .goodItem').attr('data-title').indexOf('Farming Service')!=-1){let boost_methods=[]
$('.boost_other .list_item.active').each(function(){boost_methods.push($(this).attr('data-title'))})
goods.boost_methods=boost_methods}
if(type==0){shopCart.list.unshift(goods);}}
if(shopCart.list.length==1){$('.nav .cart .cart-total em').hide()}else{$('.nav .cart .cart-total em').show()}
$('.fixed-header .shopCount').text(shopCart.list.length)
let html=template('headerCart',shopCart)
$('#headerCarts').html(html)
$('.cart .cart-link .noCart').hide()
$('.cart .cart-link .cart-total').show()
$('.cart .cart-link .cart-button').show()
var lkrprice=0;for(var i=0;i<shopCart.list.length;i++){lkrprice=lkrprice+(shopCart.list[i].num*shopCart.list[i].price)}
$('.nav .cart .cart-link .cart-total .price').attr('lkr',lkrprice)
priceCalc()
localStorage['cart']=window.btoa(window.encodeURIComponent(JSON.stringify(shopCart)))
if($('.server.device-server ul.active input').length>0){if($('.server.device-server ul.active li.active').length>0){localStorage['cate_type']=$('.server.device-server ul.active li.active').attr('value')}else{localStorage['cate_type']=$('.server.device-server ul.active input').val()}}else{if($('.server_c ul.active li.active').length>0){localStorage['cate_type']=$('.server_c ul.active li.active').attr('value')}else{localStorage['cate_type']=$('.server_c ul.active input').val()}}
if($(window).width()+8<=1024){$('.header .mobile_cart').addClass('bounce');}}
function priceCalc(){var rate=$('.header .lang-currency>p.curr-name').attr('data-rate')
var symbol=localStorage["symbol"]
var Cartprice=$('.cart .cart-link .price')
Cartprice.each(function(){$(this).find('strong').text(symbol)
var lkr=$(this).attr('lkr')
var price=(lkr*rate).toFixed(2)
$(this).find('i').text(price)})}
$('.goods-list').on('click','li.item .item-num .sub',function(){var val=$(this).siblings('input').val()
var min_num=$(this).siblings('input').attr('data-num')
var length=min_num.length
var that=$(this)
if(val-min_num<min_num){var newsVal=min_num}else{if(length>=3){var newsVal=val-100}else if(length==2){var newsVal=val-10}else{var newsVal=val-1}}
$(this).siblings('input').val(newsVal)
calcPrice(that,newsVal)})
$('.goods-list').on('click','li.item .item-num .add',function(){var val=$(this).siblings('input').val()
var min_num=$(this).siblings('input').attr('data-num')
var max=$(this).siblings('input').attr('max')
var length=min_num.length
var that=$(this)
if(parseFloat(val)>=parseFloat(max)){var newsVal=parseFloat(max)}else{if(length>=3){var newsVal=parseFloat(val)+100}else if(length==2){var newsVal=parseFloat(val)+10}else{var newsVal=parseFloat(val)+1}}
$(this).siblings('input').val(newsVal)
calcPrice(that,newsVal)})
$('.goods-list').on('blur','li.item .item-num input',function(){var val=$(this).val()
var max=$(this).attr('max')
if(val>=parseFloat(max)){val=parseFloat(max)
$(this).val(val)}
var min_num=$(this).attr('data-num')
var that=$(this)
if(val==''||parseFloat(val)<min_num){val=min_num
$(this).val(val)}
calcPrice(that,val)})
function calcPrice(that,num){var prices=that.parents('.item').find('.price')
var rate=localStorage['rate']
prices.each(function(){var lkr=$(this).attr('lkr')
var newLkr=(num*lkr)
var newsPrice=(newLkr*rate).toFixed(2)
$(this).find('i').text(newsPrice)})}
$('.quick-search button').click(function(){if(typeof good_rules=='undefined'||good_rules.length==0){return false;}
var value=$(this).siblings('.count').find('input').val();if($('.server.device-server ul.active input').length>0){if($('.server.device-server ul.active li.active').length>0){var cate_type=$('.server.device-server ul.active li.active').attr('value');}else{var cate_type=$('.server.device-server ul.active input').val();}}
if(localStorage['cart']&&localStorage['cart']!=''){if(cate_type!=localStorage['cate_type']){localStorage.removeItem('cart');}}
var shopCart;if(localStorage['cart']&&localStorage['cart']!=''){datas=localStorage['cart'];shopCart=JSON.parse(decodeURIComponent(window.atob(localStorage.getItem("cart"))));}else{shopCart={};shopCart.list=[];}
var goods={};if(good_rules.unit==''){var unit='';}else{unit=good_rules.unit;}
goods.goods_no=good_rules.goods_no;goods.num=1;goods.step=1;goods.max_num=999;goods.step=$(this).siblings('.count').find('input').attr('data-num');goods.give=$(this).siblings('.count').find('input').attr('data-give');if($(this).siblings('.count').find('input').attr('data-give')>0){goods.title=good_rules.title+' '+value+unit+' + '+$(this).siblings('.count').find('input').attr('data-give')+unit;}else{goods.title=good_rules.title+' '+value+unit;}
goods.img=good_rules.images;goods.price=$(this).siblings('.price').attr('lkr');goods.price_num=value;goods.game_sku=goods_game_sku;goods.device_type=$('.device-server.server ul.active li.active span').text()
shopCart.list.unshift(goods);localStorage['cart_num']=shopCart.list.length;$('.header .cart .cart_num').text(shopCart.list.length);localStorage['cart']=window.btoa(window.encodeURIComponent(JSON.stringify(shopCart)));localStorage['cate_type']=cate_type;let affiliate='';if($('#isAffiliate').length>0&&$('#isAffiliate').val()!=''){affiliate='?id='+$('#isAffiliate').val();}
else{affiliate=''}
window.location.href=siteUrl+'/cart'+affiliate;});if(typeof good_rules!='undefined'&&template_name=='golds'){var quickPrice,minNum,maxNum,ruleArray;quickGoodsRule();}else{$('.quick-search .price').attr('lkr',0);$('.quick-search .count input').attr('disabled',true);}
function quickGoodsRule(){quickPrice=good_rules.price;ruleArray=good_rules.rule;minNum=ruleArray[0][0];maxNum=ruleArray[ruleArray.length-1][0];$('.quick-search input').val(minNum);if(minNum.length>=3){var step=100;}else if(minNum.length==2){var step=10;}else{var step=1;}
$('.quick-search input').attr('data-num',1);$('.quick-search input').attr('step',step);priceQuick(minNum);}
function priceQuick(num){var rate=localStorage['rate'];var discount=1;var give=0;for(var i=0;i<ruleArray.length;i++){if(num==ruleArray[i][0]){discount=(100-ruleArray[i][2])/100;give=ruleArray[i][1];continue;}
if(parseFloat(num)>ruleArray[i][0]&&parseFloat(num)<ruleArray[i+1][0]){discount=(100-ruleArray[i][2])/100;give=ruleArray[i][1];continue;}}
var lkr=parseFloat(num*quickPrice*discount);$('.quick-search .price').attr('lkr',lkr);$('.quick-search input').attr('data-give',give);$('.quick-search .price i').text(parseFloat(lkr*rate).toFixed(2));}
$('.item-quick-search input').on('keydown',function(e){if(e.which==13){$('.goods-list .noDataTips').hide()
$('.goods-list ul').html('')
$('.spinner').show()
searchGoods()}})
$('.item-quick-search .input-box .ico').on('click',function(){$('.goods-list .noDataTips').hide()
$('.goods-list ul').html('')
$('.spinner').show()
searchGoods()})
function searchGoods(){var goods_name=$('.item-quick-search input').val().trim();if(goods_name!=''){searchFlag=true}else{searchFlag=false}
currentPage=1;var server_id=$('.server.device-server ul.active input').attr('data-id');var goods_name=$('.quick-search .input-box input').val()
if($('.server.device-server ul.active li.active').length>0){server_id=$('.server.device-server ul.active li.active').attr('data-id')}
if($('.child-server.active ul li.active').length>0){server_id=$('.child-server.active ul li.active').attr('data-id')}
var sort=0;if($('.goods__sort .sort__item.active').length>0){sort=$('.goods__sort .sort__item.active').attr('data-sort');}
$.ajax({url:siteUrl+'/goods/goods_ajax',type:'get',dataType:'json',data:{template_type:template_name,server_id:server_id,page:currentPage,goods_name:goods_name,sort:sort},beforeSend:function(){pageFlag=true;$('.goods-list img').removeClass('lazy')},success:function(res){$('.spinner').hide()
var data=res.data
if(data.goods.length==0){$('.goods-list .noDataTips').show()}else{for(var i=0;i<data.goods.length;i++){data.goods[i].max=Math.ceil(2000/data.goods[i].true_price)}}
var html=template('itemHtml',data)
$('.goods-list ul').html(html)
$('.goods-list img.lazy').lazyload({threshold:300})
goodsPriceCalc()
pageInit(res.data.count)
var url=default_siteHost+location.pathname;history.pushState({url:url,title:document.title},document.title,url)}})}
$('.items-list ul').on("mouseover","li .item-img",function(e){var img=$(this).find('img').attr('data-src')
if($(this).find('.bigImage').find('img').attr('src')!=img){$(this).find('.bigImage').find('img').attr('src',img)}
$(this).find('.bigImage').addClass('display')
if(!$(this).find('.bigImage').hasClass('display')){e.stopPropagation()}});$('.items-list ul').on("mouseout","li .item-img",function(e){$(this).find('.bigImage').removeClass('display')});window.onload=function(){$('html,body').animate({scrollTop:'0'},50);}
$('.goods__sort .sort__item').click(function(){$(this).addClass('active').siblings().removeClass('active')
ajaxList('sort')})})