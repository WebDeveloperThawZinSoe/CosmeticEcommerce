<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
    <title>Game Currency</title>
    
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery.min.js')}}"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/jquery-cookie.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/web/css/publica9f2.css?v=2.6')}}">
    <link rel="stylesheet" href="{{asset('static/web/css/public_mobile3cc5.css?v=1.6')}}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-5GM6S5L"
        type="d36be3e83a75e566173ee08a-text/javascript"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());
        gtag('config', 'GTM-5GM6S5L');
        gtag('consent', 'default', {
            'ad_storage': 'granted',
            'analytics_storage': 'granted',
            'ad_user_data':'granted',
            'ad_personalization': 'granted',
            'wait_for_update': 500
        });

        dataLayer.push({
            'event': 'default_consent'
        })
    </script>
    <style>
        p{
            text-align:justify !important;
        }
    </style>
</head>

<body>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="static/web/js/cmp.js"></script>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GM6S5L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <script type="d36be3e83a75e566173ee08a-text/javascript">
    var def_currency = '{&quot;code&quot;:&quot;USD&quot;,&quot;symbol&quot;:&quot;$&quot;,&quot;rate&quot;:&quot;1.0000&quot;}';
    var s = def_currency.replace(/&quot;/g, '"');
    var currency = JSON.parse(s)
    var siteUrl = 'index.html'
    var default_siteHost = 'index.html'
    var current_lang = 'en'
    var deletePublicHtml = '<div class="delete-public-box display"><i class="ico delete-close"></i><p>Are you sure you want to delete all items?</p><div><button class="yes">Yes</button><button class="no delete-close">No</button></div></div>'
</script>

@include('layouts.web.header')

</script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
  $(document).ready(function() {
    
  $('.nav ul.nav-help-menu li a:not(:first-child)').each(function() {
    var text = $(this).text();
    var words = text.split(' '); // 将字符串拆分为单词数组
    
    // 将每个单词的首字母大写，其余字母小写
    for (var i = 0; i < words.length; i++) {
      words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
    }
    // 重新拼接字符串并设置回<a>标签
    $(this).text(words.join(' '));
  });
  $('.nav ul.nav-help-menu li a>span').each(function() {
    var text = $(this).text();
    var words = text.split(' '); // 将字符串拆分为单词数组
    
    // 将每个单词的首字母大写，其余字母小写
    for (var i = 0; i < words.length; i++) {
      words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
    }
    // 重新拼接字符串并设置回<a>标签
    $(this).text(words.join(' '));
  });

  $('.footer-content .link .link-title').each(function() {
    var text = $(this).text();
    var words = text.split(' ');
    for (var i = 0; i < words.length; i++) {
      words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1).toLowerCase();
    }
    $(this).text(words.join(' '));
  });
});
     
</script>
    <script src="../www.google.com/recaptcha/api85f1.js?onload=onloadCallback&amp;render=explicit" async defer
        type="d36be3e83a75e566173ee08a-text/javascript"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
var isMobile = window.innerWidth <= 768;
   var containerId = isMobile ? 'open_google_mobile' : 'open_google';
   console.log(containerId);
   var verifyCallback = function (response) {
	   $("#google_key").val(response);
	   
   };
  var onloadCallback = function () {
   grecaptcha.render(containerId, {
	'sitekey': '6LfTHt4pAAAAAOrDGosdAQp-_EmP7RmNDMlchuYd',
   'callback': verifyCallback
	});
   };

</script>
    <script type="d36be3e83a75e566173ee08a-text/javascript" src="static/web/js/public8329.js?v=7.2"></script>
    <link rel="stylesheet" type="text/css" href="static/web/css/html.css" />
    <link rel="stylesheet" type="text/css" href="static/web/css/mobile_html.css" />
    <div class="main container" style="min-height: 600px;">
      
        <div class="help-center">
        <p style="text-align: center;background-"><span style="color:#ffffff;font-size:36pt;font-family:alver;">PRIVACY&nbsp;POLICY</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Introduction</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">This Privacy Policy describes your privacy rights regarding use, storage, sharing, and protection of your Personal Information by website VideoGameCurrency.com. It applies to the Site and all related sites, applications, services and tools where this policy is referenced, regardless of how you access or use them, including mobile devices. This policy does not apply to the practices of third parties that VideoGameCurrency does not own or control, or to individuals that we do not employ or manage. This policy may change from time to time, so please check back periodically.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Scope of the Privacy Policy</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">We take your privacy very seriously. Please read this privacy policy carefully as it contains important information on who we are and how and why we collect, store, use and share your personal data.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">We collect, use and are responsible for certain personal data about you. When we do so we are subject to the applicable laws including the General Data Protection Regulation (GDPR), which applies across the European Union (including in the United Kingdom) and we are responsible as a &lsquo;controller&apos; of that personal data for the purposes of those laws.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Collection of Personal Information</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. You can browse the Site without telling us who you are. If you choose to provide us with Personal Information, you consent to the transfer and storage of that information to our servers. We may collect other information that is provided to us by your web browser. This may include the browser you used to come to our website, the Uniform Resource Locator (&quot;URL&quot;) of the website that you just visited before visiting our website, which pages on our website you visit, any search terms you entered, which URL you go to next, and your Internet Protocol (&quot;IP&quot;) address.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. We may collect and store the following Personal Information:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Name, surname, date of birth, personal identification code, image, email address, physical address, phone number, physical contact information, and sometimes financial information (including respective financial account data);</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Transactional information based on your activities on the Site (such as information to facilitate buying and selling);</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Chats, reviews, dispute resolution, correspondences through the Site, and correspondences sent to us;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Computer sign-on data, statistics on page views, traffic to and from the Site, and cookies information;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Other information, including IP address and standard weblog information, and supplemental information from third parties.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">3. You can choose not to provide information to us, but in general some information about you is required in order for you to: register as a member; purchase products or services; complete a profile; participate in a survey, contest, or sweepstakes; ask us the questions; or initiate other transactions on our site.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">4. We may receive or collect supplemental information about you from third party sources and add it to your account information. This may include, but is not limited to, demographic, navigation information, additional contact information, credit check information, and additional information about you from credit bureaus, social networks, consumer behavior firms, or other sources, as permitted by law.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">5. Transfer and Storage of Personal Data. We may transfer your Personal Information to the U.S., to any VideoGameCurrency&apos;s affiliate worldwide, or to third parties acting on our behalf for the purposes of processing or storage. By using any of our products or providing any Personal Information for any of the purposes stated below, you consent to the transfer and storage of your Personal Information, whether provided by you or obtained through a third party, including the hosting of such Personal Information on our servers.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Use</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. Our primary purpose in collecting Personal Information is to provide you with access the Site/or use of our services, applications and tools, provide you with requested customer service and relevant information about your account and our services, and to provide you with a safe, smooth, efficient, and customized experience. You agree that we may use your Personal Information to:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Provide the services and customer support you request;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Prevent, detect, and investigate, fraud, security breaches, potentially prohibited or illegal activities, and enforce our Terms of Service and Policies;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Customize, measure, and improve Site&apos;s services, content, and advertising;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Contact you, either via email or telephone, to resolve disputes, collect fees, troubleshoot problems with your account or our sites, services, applications or tools, or for other purposes authorized by law;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Protect our rights, property, and safety, including that of our employees, Users, or others;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Contact you, either via email or telephone, to inform you about our services and those of our corporate family, deliver targeted marketing, service updates, and promotional offers based on your communication preferences;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Compare information for accuracy, and verify it with third parties;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Contact you via telephone, email, or text (SMS) messages (if applicable) as authorized for purposes described in this Privacy Policy;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Provide you other services requested by you as described when we collect information.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. In case you consent, we will send you marketing messages via email and/or leave a notification in an Account to inform you on the news and offers we think might be important and/or beneficial to you.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">3. Also, if we already have provided services to you and you do not object we will inform you about our other products that might interest you including other information related to such.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">4. You may opt-out of receiving marketing messages at any time. You may do so by:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">Choosing the relevant link in any of our marketing messages;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">Contacting us via means provided Contact section of the Site.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">5. Upon you having fulfilled any of the provided actions we will update your profile to ensure that you will not receive our marketing messages in the future.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">6. The opt-out of the marketing messages will not stop you from receiving messages directly related to the provision of services.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">7. Please note that we do not sell or rent your Personal Information to third parties for their marketing purposes without your explicit consent.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">8. We also process Personal Information for VideoGameCurrency&apos;s legitimate interest. VideoGameCurrency has considered this processing to be necessary for the purposes of the legitimate interest pursued by VideoGameCurrency, which VideoGameCurrency has considered outweighing data subject&apos;s interest of protection of the personal data. Example of purpose for such processing is to establish, exercise and defend legal claims, prevent fraud and similar crimes and to gather evidence.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Storage of Personal Data</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">We will keep your personal data while you have an account with us or we are providing services to you. Thereafter, we will keep your personal data for as long as is necessary</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; to respond to any questions, complaints or claims made by you or on your behalf</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; to show that we treated you fairly</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; to mitigate fraud against us or our active users</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; to keep records required by law</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">We will not retain your personal data for longer than necessary for the purposes for which it was collected. Different retention periods apply for different types of personal data.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">When it is no longer necessary to retain your personal data, we will delete or anonymize it.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Our Disclosure of Your Information</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. VideoGameCurrency may disclose Personal Information to comply with legal requirements, enforce our policies, respond to claims that a listing or other content violates the rights of others, or protect anyone&apos;s rights, property, or safety. Such information will be disclosed in accordance with this Privacy Policy and applicable laws and regulations. As stated above, we do not disclose your Personal Information to third parties for their marketing purposes without your explicit consent.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. We may also share your Personal Information with:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Members of our affiliates to provide joint content and services (like registration, transactions, and customer support), to help detect and prevent potentially illegal acts, violations of our policies, fraud and/or data security breaches, and to guide decisions about their products, sites, applications, services and tools, and communications. Our affiliates may use this information to send you marketing communications only if you have consented to their services and will use your Personal Information in compliance with their Privacy Policy as well as ours;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Service providers who help with our business operations (such as, but not limited to, payment processing, fraud investigations, bill collection, affiliate and rewards programs);</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Other third parties to whom you explicitly ask us to send your information (or about whom you are otherwise explicitly notified and consent to);</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Law enforcement, governmental agencies, or authorized third-parties, in response to a verified request relating to a criminal investigation or alleged illegal activity or any other activity that may expose VideoGameCurrency, you, or any other User of the Site to legal liability. In such events, we will only disclose information relevant and necessary to the investigation or inquiry, such as name, city, state, ZIP code, telephone number, email address, User ID history, IP address, fraud complaints, bidding and listing history, and anything else we may deem relevant to the investigation;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Credit bureaus with which we may report information about your account, including information on late payments, missed payments, or other defaults on your account;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Other business entities, should we plan to merge with or be acquired (whether through an asset sale or otherwise) by that business entity. (Should such a combination occur, VideoGameCurrency will require that the new combined entity follow this Privacy Policy with respect to your Personal Information. If your Personal Information will be used contrary to this policy, you will receive prior notice, and will be given the opportunity to withdraw your consent to the collection, storage, and transfer of your Personal Information);</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Other Site&apos;s Users, whether located in your country of residence or outside of your country of residence, as authorized by you.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Information You Share on the Site</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. Your User Name is displayed throughout the Site (and so available to the public), and is connected to all of your activity on the Site. Other people can see your feedback, ratings, and associated comments. Notices sent to other community members about suspicious activity and policy violations on our sites refer to User Names and specific items. So if you associate your name with your User Name, the people to whom you have revealed your name will be able to personally identify your activities on the Site.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. If you access our sites from a shared computer or a computer in an internet caf&eacute;, certain information about you, such as your User Name, activity, or reminders from VideoGameCurrency, may also be visible to other individuals who use the computer after you.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">3. If you use a message board, blog, or chat room on the Site, you should be aware that any personally identifiable information you submit there may be read, collected, or used by other Users of these forums, and could be used to send you unsolicited messages. We are not responsible for the personally identifiable information you choose to submit in these forums.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Using Information from the Site</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">to disclose your privacy practices and respect the privacy of other Users. We cannot guarantee the privacy or security of your information and therefore we encourage you to evaluate the privacy and security policies of your trading partner before entering into a transaction and choosing to share your information. To help protect your privacy, we allow only limited access to other Users&apos; contact, shipping and financial information to facilitate your transactions and collect payments. When Users are involved in a transaction, they may have access to each other&apos;s name, User ID, email address and other contact and shipping information. In all cases, you must give other Users a chance to remove themselves from your database and a chance to review what information you have collected about them.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. You agree to use User information only for:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">Site&apos;s transaction-related purposes that are not unsolicited commercial messages; or</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">Using services offered through the Site (such as fraud complaints); or</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">Other purposes that a User expressly chooses.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">No Spam, Spyware, Phishing, or Spoofing</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. We do not tolerate spam. You are not licensed to contact other Site&apos;s Users or add them to a mail list (email or physical) without their express consent. In addition, you may not use our communication tools to send spam or otherwise send content that would violate our Terms of Service. We may automatically scan and/or manually filter messages to check for spam, viruses, phishing attacks, and other malicious activity or illegal or prohibited content. To report spam or spoof emails related to the Site, please forward the email to&nbsp;Support@VideoGameCurrency.com.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. VideoGameCurrency may, but is not obligated, to send you strictly service-related announcements on occasions when it is necessary to do so. For example, if our service is temporarily suspended for maintenance, we might send you an email. Generally, you may not opt-out of these communications since they are not promotional in nature and are necessary to maintain the quality of our service. If you do not wish to receive them, you may have the option to deactivate your account.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Cookies, Web Beacons, and Similar Technologies</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. The Site uses cookies and other technologies that are essentially small data files placed on your computer, tablet, or mobile phone (referred to collectively as a &quot;device&quot;) that allow us to record certain pieces of information whenever you visit or interact with our sites, services, applications, messaging, and tools. The specific names and types of the cookies, web beacons, and other similar technologies we use may change from time to time. In order to help you better understand this Policy and our use of such technologies, we have provided the following definitions:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Cookies: Small text files placed in the memory of your browser or device when you visit a website or view a message. Cookies allow us to recognize a particular device or browser.</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Web beacons: Single pixel image files that allow a website to count Users who have visited a particular page or accessed certain cookies. Web beacons may be placed on specific pages across the Site. When a visitor accesses these pages, a notice of that visit is generated which may be processed by VideoGameCurrency. These web beacons work in conjunction with cookies.</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Service providers: Companies that help VideoGameCurrency with various aspects of our business, such as site operations, services, applications, advertisements and tools. We use some authorized service providers to help us to serve you relevant ads on our services and other places on the Internet. These service providers may also place cookies on your device via our services (third party cookies). They may also collect information that helps them identify your device, such as IP-address, ID for Advertising (IDFA), or other unique or device identifiers.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. When you visit or interact with our Site, services, applications, tools, or messaging, we or our authorized service providers may use cookies, web beacons, and other similar technologies for storing information to help provide you with a better, faster, and safer experience.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">3. The Site uses cookies to:</span></p>
<ul>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Allow you to enter your password less frequently during a session;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Provide information that is targeted to your interests;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Promote and enforce trust and safety;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Offer certain features that are only available through the use of cookies;</span></p>
    </li>
    <li style="list-style-type:disc;color:#b7afa3;font-size:10pt;font-family:'Noto Sans Symbols',sans-serif;">
        <p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">&bull; Measure promotional effectiveness.</span></p>
    </li>
</ul>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">4. You are free to block, delete, or disable Cookies and similar technologies if your device so permits. You can manage your cookies and your cookie preferences in your browser or device settings. In addition, if you do not want to associate your anonymous cookie information with your visits to pages containing web beacons, depending on the browser used, you can set your browser to turn off cookies.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">5. Keep in mind that if you decline cookies or other similar technologies, you may not be able to take advantage of certain Site features, services, applications, or tools. You may also be required to re-enter your password more frequently during your browsing session. For more information on how you can block, delete, or disable these technologies, please review your browser or device settings.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Account Protection and Security</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. Your information is stored on our servers. We protect your information using technical and administrative security measures to reduce the risks of loss, misuse, unauthorized access, disclosure and alteration. Some of the safeguards we use include firewalls, data encryption, and information access authorization controls. However, it is possible that third parties may unlawfully intercept or access transmissions or private communications, and other Users may abuse or misuse your Personal Information that they collect from the Site. Therefore, although VideoGameCurrency works very hard to protect your privacy, we do not guarantee, and you should not expect, that your Personal Information or private communications will always remain private.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. Your password is the key to your account. Please do not disclose your Account password to anyone. If you do share your password or your Personal Information with others, remember that you are responsible for all actions taken and financial commitments made in the name of your account. If you lose control of your password, you may lose substantial control over your Personal Information and may be subject to legally binding actions taken on your behalf. Therefore, if your password has been compromised for any reason, you should immediately notify VideoGameCurrency and change your password.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">3. Upon your request, we will close your account and remove your Personal Information from view as soon as reasonably possible, based on your account activity and in accordance with applicable law. We do retain Personal Information from closed accounts in order to comply with state and federal laws, deter fraud, collect any outstanding debts, resolve disputes, troubleshoot problems, assist with investigations, enforce our Terms of Service and Policies, and take other actions otherwise permitted by law. Over time, VideoGameCurrency may no longer have an ongoing legitimate business need to process your personal information. At that time, we will either delete your personal information or anonymize it.</span></p>
<p style="background-"><span style="color:#ffffff;font-size:22.5pt;font-family:alver;">Accessing, Reviewing and Changing Your Personal Information</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">1. We take steps to ensure that the Personal Information we collect is accurate and up to date, and we provide you with the opportunity to update your information through your account profile settings. You can see, review and change most of your Personal Information, including opt-in and opt-out communications preferences, by logging in to your Account. Generally, we will not manually modify your Personal Information. You must promptly update your Personal Information if it changes or is inaccurate. Once you make a public posting, you may not be able to change or remove it.</span></p>
<p style="background-"><span style="color:#b7afa3;font-size:10.5pt;font-family:Tahoma,sans-serif;">2. At any time, you can request information about the personal data we collect, request that we correct personal data, or request that we stop processing your personal data in certain ways. To contact us about these rights, please send an email to&nbsp;support@videogamecurrency.com.</span></p>
<p><br></p>
<p><br></p>

            <p>
            <p dir="ltr" style="line-height:1.2;text-align: center;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:36pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">TERMS &amp; CONDITIONS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SUMMARY OF TERMS OF SERVICE</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency is a platform where users can buy, review Path of Exile in-game products. These Terms of Service govern your rights and obligations, as users of the portals administered and managed by</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">If you visit our website (www.videogamecurrency.com), you affirmatively accept the following conditions. We reserve the right to change the terms, conditions, and notices under which our websites and services are offered, including but not limited to the charges associated with the use of our websites and services. The included terms and agreement are subject to change at any time. While we may provide notice of changes that occur, this is no way constitutes an obligation on our part. It is your obligation to read these terms thoroughly, carefully, and regularly to become aware of such changes as may occur. If you do not agree to such changes, you may delete your account at any time. Your continued use of our websites and services constitutes your agreement to all such terms, conditions, and notices. All terms are defined within the agreement or within the definitions section.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">All valued customers: IMPORTANT! PLEASE READ CAREFULLY.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">THIS IS A LEGAL AGREEMENT BETWEEN YOU AND . BY READING THIS, YOU ACCEPT ALL TERMS AND CONDITIONS OF THIS AGREEMENT. IF YOU DO NOT WISH TO ACCEPT THIS AGREEMENT, YOU SHOULD USE THE &quot;BACK BUTTON&quot; OF YOUR INTERNET BROWSER OF CHOICE AND RETURN TO THE PREVIOUS PAGE.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">. (referred to herein as &apos;VideoGameCurrency&apos; or &apos;videogamecurrency.com&apos; interchangeably) offers these &apos;Terms and Conditions&apos; to all active members, customers, or visitors to our website and to services we offer. VideoGameCurrency reserves the right to change these terms, conditions, and notices under which the website and services VideoGameCurrency offers without any prior notification. All use of the website and services VideoGameCurrency offers is governed by the terms listed in these Terms and Conditions. Your continued use of VideoGameCurrency&apos;s website&apos;s affiliate/advertising sites is governed by the &apos;Terms and Conditions&apos; and &apos;Privacy Policy&apos; set forth by our company. It is the user&apos;s sole responsibility to regularly review these conditions and any other conditions that affect this website and services offered.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">PRIVACY AND CONDITIONS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">You are responsible for reading and understanding the &quot;Terms and Conditions&quot; and &quot;Privacy Policy&quot; before completing any transaction through our website.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">ELECTRONIC COMMUNICATIONS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">When coming to VideoGameCurrency.com you are communicating with us electronically. You consent to receive communications from us electronically. We communicate with you via several methods such as e-mail, live help or phone conversations. You agree that all information provided to VideoGameCurrency is factual and true, and without any intentional omission or alteration.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">COPYRIGHT</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Content such as text, graphics, backgrounds, logos, button icons, images, flash videos, downloads, software, audio or video clips and/or data compilations is the property of VideoGameCurrency, and thus is protected by copyright laws of the international copyright treaties and conventions, and other laws. All rights are reserved. You may not use anything from VideoGameCurrency&apos;s website without proper written consent from VideoGameCurrency. Content presented on VideoGameCurrency&apos;s website (access through https://www.videogamecurrency.com/ or any other sub domains) may contain certain licensed materials, and all original licensors of the materials may protect their rights in the event of any violation of this agreement.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">ACCOUNTS PURCHASE</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">You are solely responsible for maintaining your game account and password at all times. VideoGameCurrency is not responsible at anytime for any problems regarding your game account after purchase. VideoGameCurrency only agrees to give as much information as is necessary to change the password on an account. VideoGameCurrency is not responsible for account or character transfers.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">BILLING</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency will never charge for products or services unless VideoGameCurrency receives consent from the buyer. VideoGameCurrency verifies information before delivering the items. Make sure your billing information is up to date so VideoGameCurrency can instantly confirm that the information is correct and follow up with a fast delivery.Due to frequent and increasing fraudulent activities experienced in this business, VideoGameCurrency currently DOES NOT authorize credit card accounts and/or paypal accounts with unverified addresses and/or unconfirmed telephone numbers. Please be sure that when entering your personal information you double check ALL INFORMATION and confirm it is current and accurate before submitting it. ALL unconfirmed/unverified purchases will be cancelled upon discovery, thus delaying the efficiency of the purchase/transaction. Please contact us with E-Mail Support listed on the website.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SHIPPING AND HANDLING</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Rarely is shipping required when buying products from VideoGameCurrency. If shipping is necessary, VideoGameCurrency will contact you with shipping costs prior to charging you for your order.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SELLING PRODUCTS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">When you sell your accounts to VideoGameCurrency, you sell them knowing that they will be the properties of VideoGameCurrency once payment is sent. Any account you wish returned will only be returned with written permission from our company. If at any time it is discovered that you, the seller, retrieve the ownership of the accounts from either VideoGameCurrency or any individual that currently holds ownership, VideoGameCurrency reserves full rights to receive a full refund.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">The selling of duplicated, macroed, copied or any kind of mass-produced or fast-produced items and/or outside programs is prohibited. If such programs are used, VideoGameCurrency has the right to report these devices to the proper authorities. If the product is duplicated, macroed or copied, VideoGameCurrency reserves the right to delete the product, and issue no money or trade to the seller. It is illegal to sell these materials and VideoGameCurrency will knowingly stay away from such materials. VideoGameCurrency will never delete the product unless tested and confirmed that it is indeed an illegal material.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">When selling any merchandise to VideoGameCurrency, you are responsible for all merchandise in the event of it&apos;s becoming unusable by VideoGameCurrency.com. If any of the above selling products terms are violated, VideoGameCurrency has full rights to receive a full refund.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">LICENSE AND SITE ACCESS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency issues a limited license to access and make personal use of of VideoGameCurrency&apos;s website and will not allow you to download, archive, modify, or in any way alter the original intended content, in part or in whole, except with express written consent from VideoGameCurrency. This license does not include any resale or commercial use of the site&apos;s contents. Site product listings, collections, descriptions, or prices are not allowed to be copied in any manner, electronically or otherwise. You may not download or copy account information or use data mining, robots, or similar data gathering and extracting services. The site may not be reproduced, duplicated, copied, sold, resold or in any way used by any outside source unless written consent from VideoGameCurrency is obtained. Any individual found violating terms listed above in the LICENSE AND SITE ACCESS section shall face legal action taken on behalf of VideoGameCurrency.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SITE AND SERVICES</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency sometimes provides links and pointers to third party sites. At no time is VideoGameCurrency responsible for any actions of outside parties. The products and services offered through VideoGameCurrency&apos;s website can be found by viewing the VideoGameCurrency.com website (access through https://www.videogamecurrency.com/ and other subdomains). The material contained in this site and the third party sites is provided as is without any warranties of any kind unless explicitly stated otherwise by us. In regards to all virtual goods and services that VideoGameCurrency provides, VideoGameCurrency only provides a service to buyers. No tangible goods are being sold to the buyers. VideoGameCurrency is not linked in any way to any of the game licensors, producers, designers or publishers and act merely as a third party agent, separated from these game companies and/or licensors.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency claims no title to any intellectual property interests held by any of the game companies and/or licensors except those granted by these companies. As no intellectual property interests are being transferred by VideoGameCurrency to buyers through any transaction, VideoGameCurrency has no representations regarding the transferability, use and ownership of any game companies&apos; intellectual property. VideoGameCurrency does not allow any of these game companies&apos; representatives to purchase products through VideoGameCurrency. The buyer wholly assumes all risk and agrees to defend, hold harmless for any claims made by any of the game companies producers or designers in relation to this transaction and use of their intellectual property.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">REVIEWS AND COMMENTS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">You may submit comments, ideas, questions and any other written information as long as they are not slanderous or libelous comments such as illegal information, obscene gestures, threatening remarks, defamation, invasion of privacy, infringement on intellectual property rights, or anything otherwise injurious to third parties or objectionable, and does not consist or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or any form of &apos;spam.&apos; You are never allowed to use false e-mails or try to impersonate or copy any person or entity or otherwise mislead as to the origin of a credit card or other content. VideoGameCurrency reserves the right to remove or edit such content, but does not regularly review posted content. If you post content or submit material without VideoGameCurrency&apos;s authorization or or explicitly written permission granting you authority, VideoGameCurrency may take serious legal action against you.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">ACCOUNT VERIFICATION</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">You may be required to supply additional information when ordering a product or service from our company. This may include a valid home phone number, additional e-mails or a faxed drivers license.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Due to frequent and increasing fraudulent activities experienced in this business, we at VideoGameCurrency currently DO NOT authorize credit card accounts and/or paypal accounts with unverified addresses and/or unconfirmed telephone numbers. Please be sure that while entering your personal information you double check ALL INFORMATION and confirm it is all current and accurate before submitting it. ALL unconfirmed/unverified purchases will be cancelled upon discovery, thus delaying the efficiency of the purchase/transaction. Please contact VideoGameCurrency using the Live Help feature on the website, or with E-Mail Support listed on the website.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">OTHER BUSINESSES</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency may provide links to outside sites that may be involved in selling products or services. VideoGameCurrency is not responsible for examination or evaluation of the sites and VideoGameCurrency does not control the website content or decision making of outside companies. Our company assumes no responsibility or liability for any actions from these sites taken against you.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">DISPUTES</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">Any dispute relating in any way to these Terms and Conditions, your visit to the Company&apos;s websites or to products and/or services you purchase through the Company shall be exclusively submitted to arbitration in Hong Kong, except that, to the extent you have in any manner violated or threatened to violate the Company&apos;s intellectual property rights, the Company may seek injunctive or other appropriate relief in any court in the World, and you consent to exclusive jurisdiction and venue in such courts. Arbitration under these Terms and Conditions shall be conducted under the rules then prevailing in Hong Kong. The arbitrator&apos;s award shall be binding and may be entered as a judgment in any court of competent jurisdiction. To the fullest extent permitted by applicable law, no arbitration under these Terms and Conditions shall be joined to an arbitration involving any other party subject to these Terms and Conditions, whether through class arbitration proceedings or otherwise.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">SITE POLICIES</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency reserves the right to change any site conditions and policies with or without any prior notification to the clients and members. It is the sole responsibility of clients and members to pay close attention to any changes and/or adjustments to the clauses listed here in the Terms and Conditions. By signing up for an account with VideoGameCurrency.com, or purchasing any merchandise or service, you are automatically agreeing to the clauses listed here in the Terms and Conditions</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;"><span style="font-size:22.5pt;font-family:alver;color:#ffffff;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">TITLE TO INTERACTIVE ITEMS AND ACCOUNTS</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 7.5pt 0pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">VideoGameCurrency makes no claims to the title for any virtual items purchased through VideoGameCurrency.com. All virtual items brokered through VideoGameCurrency.com relating to the game are owned by their respective original licensors, VideoGameCurrency is in no way affiliated with the companies listed. VideoGameCurrency is merely acting as a temporary custodian of the interactive game items and/or accounts related to any service provided for each game. At the conclusion of any transaction, you assume VideoGameCurrency merely as a licensee of the respective game owners to use its intellectual property and you assume all responsibilities or obligations, and shall perform any and all duties owed to the respective game owners, and agree to indemnify and hold VideoGameCurrency harmless as set forth below.</span></p>
<p dir="ltr" style="line-height:1.2;background-color:#000000;margin-top:0pt;margin-bottom:7.5pt;"><span style="font-size:10.5pt;font-family:Tahoma,sans-serif;color:#b7afa3;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;">By entering https://www.videogamecurrency.com/ you agree to all the terms above and using VideoGameCurrency&apos;s service, you agree unconditionally to all the terms listed above, without any objection.</span></p>
            </p>
        </div>
    </div>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    $(function () {
        $('.faq-content .item .item-title').click(function () {
            if ($(this).hasClass('up')) {
                $(this).removeClass('up')
            } else {
                $(this).addClass('up')
            }
            $(this).siblings('.item-text').slideToggle(100)
            $(this).parents('.item').siblings('li').find('.item-text').slideUp(100)
            $(this).parents('.item').siblings('li').find('.item-title').removeClass('up')
        })

        $('.faq-cate li').click(function () {
            $(this).addClass('active').siblings().removeClass('active')
        })

        if ($('.faq-content .item').length > 0) {
            $('.faq-content .item').each(function () {
                var str = $(this).find('.item-title span').text()
            })
        }

        $('.search-question input').keydown(function (e) {
            if (e.which == 13) {
                var titleArr = [];
                var val = $(this).val()
                searchVal(val)
            }
        })

        $('.search-question').on('click', 'i', function () {
            $('.faq-tips').remove()
            var titleArr = [];
            var val = $(this).siblings('input').val()
            searchVal(val)

        })

        function searchVal(val) {
            $('.faq-content .faq-tips').remove()
            if (val == '') {
                $('.faq-content .item').show()
            } else {
                var num = 0;
                $('.faq-content .item').each(function () {
                    if ($(this).find('.item-title span').text().toLowerCase().indexOf(val.toLowerCase()) != -1) {
                        $(this).show()
                        num++;
                    } else {
                        $(this).hide()
                    }
                })
                if (num == 0) {
                    $('.faq-content').append("<div class='faq-tips'>No more data</div>")
                }
            }
        }
        $('.faq-cate li').eq(0).addClass('active')
        var faqtype = $('.faq-cate li.active').attr('data-type')
        $('.faq-cate li').click(function () {
            var types = $(this).attr('data-type')
            cate(types)
        })
        function cate(type) {
            var num = 0;
            $('.faq-tips').remove()
            $('.faq-content .item').each(function () {
                if ($(this).attr('data-type') == type) {
                    $(this).show()
                    num++;
                } else {
                    $(this).hide()
                }
            })
            if (num == 0) {
                $('.faq-content').append("<div class='faq-tips'>No more data</div>")
            }
        }

        footer()
        function footer() {
            $('.main').css('min-height', $(window).height() - $('.footer').height());
        }
    })
</script>
    <style>
        img {
            width: 100%;
        }
    </style>
    @include("layouts.web.footer")
    <div class="back-top-button footer-common-button">
        <i class="ico"></i>
    </div>

    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
	var liveFlag = false;
	var liveTime;
	setTimeout(function () {
		window.__lc = window.__lc || {};
		window.__lc.license = 12135636;;
		(function (n, t, c) {
			function i(n) {
				return e._h ? e._h.apply(null, n) : e._q.push(n)
			}
			var e = {
				_q: [],
				_h: null,
				_v: "2.0",
				on: function () {
					i(["on", c.call(arguments)])
				},
				once: function () {
					i(["once", c.call(arguments)])
				},
				off: function () {
					i(["off", c.call(arguments)])
				},
				get: function () {
					if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
					return i(["get", c.call(arguments)])
				},
				call: function () {
					i(["call", c.call(arguments)])
				},
				init: function () {
					var n = t.createElement("script");
					n.async = !0, n.type = "text/javascript", n.src =
						"../cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
				}
			};
			!n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
		}(window, document, [].slice))
		LiveChatWidget.on('ready', function () {
			$('#chat-widget-container').hide()
			$('.live-chat-button').show()
			liveFlag = true
			clearInterval(liveTime)
			if ($('.liveLoad').hasClass('display')) {
				$('.liveLoad').removeClass('display')
				$('#chat-widget-container').show()
				LiveChatWidget.call('maximize')
			}
		})
		LiveChatWidget.on('visibility_changed', LiveHide)

		function LiveHide(data) {
			switch (data.visibility) {
				case 'maximized':
					break;
				case 'minimized':
					$('#chat-widget-container').hide()
					break;
				case 'hidden':
					break;
			}
		}
		$('.live-chat-button').click(function () {
			$('#chat-widget-container').show()
			LiveChatWidget.call('maximize')
		})
		$('body').on('click', '.livechatheader', function () {
			$('#chat-widget-container').show()
			LiveChatWidget.call('maximize')
		})
	}, 8000)
	$('.live-chat-button').click(function () {
		if (!liveFlag) {
			$('.liveLoad').addClass('display')
			var text = '.'
			liveTime = setInterval(() => {
				if (text == '......') {
					text = ''
				}
				text += '.'
				$('.liveLoad p').text(text)
			}, 400)
		}
	})

	$('body').on('click', '.livechatheader', function () {
		if (!liveFlag) {
			$('.liveLoad').addClass('display')
			var text = '.'
			liveTime = setInterval(() => {
				if (text == '......') {
					text = ''
				}
				text += '.'
				$('.liveLoad p').text(text)
			}, 400)
		}
	})
</script>
    
    <style>
        .footer.cookie_padding {
            padding-bottom: 68px;
        }
    </style>
    <script type="d36be3e83a75e566173ee08a-text/javascript">
    $(function() {
        var req_gtm = new XMLHttpRequest();
        req_gtm.open('GET.html', document.location, true);
        req_gtm.send(null);
        req_gtm.onload = function() {
            var headers = req_gtm.getAllResponseHeaders().toLowerCase();
            if(headers.indexOf('gtm_ccdd') != -1) {
                // if($.cookie('accept_cookie')) {
                    $('.cookie_common_dialog').remove()
                    $('.footer').removeClass('cookie_padding')
                // } else {
                //     $('.accept_cookie').addClass('display')
                //     $('.footer').addClass('cookie_padding')
                // }
            } else {
                $('.cookie_common_dialog').remove()
                $('footer').removeClass('cookie_padding')
            }
        }
        $('.accept_cookie button').click(function() {
            $('.cookie_common_dialog').remove()
            $('.footer').removeClass('cookie_padding')
            $.cookie('accept_cookie', 1)
            gtag('consent', 'update', {
                'ad_storage': 'granted',
                'ad_user_data': 'granted',
                'ad_personalization': 'granted',
                'analytics_storage': 'granted',
            });
        })

        $('.accept_cookie .accept_cookie_r span').click(function() {
            $('.footer').removeClass('cookie_padding')
            $('.cookie_common_dialog').remove()
            $.cookie('accept_cookie', 2)
            gtag('consent', 'update', {
                'ad_storage': 'denied',
                'ad_user_data': 'denied',
                'ad_personalization': 'denied',
                'analytics_storage': 'denied',
            });
        })
    })
</script>
    <script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="d36be3e83a75e566173ee08a-|49" defer></script>
</body>
<script type="d36be3e83a75e566173ee08a-text/javascript" src="{{asset('static/web/js/template.js')}}"></script>

<script type="d36be3e83a75e566173ee08a-text/javascript"
    src="../widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>




</html>