@extends('web')
@section('title', 'Terms of Service | MyNovelHub')
@section('meta_keywords', 'Terms', 'Service')
@section('meta_description', 'Terms of our website.')

@section('content')
<div class="container box-sh mt-5 mb-5">
    <div class="block-header">
        <h3 class="block-title">
            {{ __('Terms of Service') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __("Thank you for using MyNovelHub! MyNovelHub's products and services are provided by MyNovelHub. These Terms of Service govern your access to and use of MyNovelHub's website, products, and services. Please read these Terms carefully, and contact us if you have any questions. By accessing or using our Products, you agree to be bound by these Terms. These terms may be updated from time to time. We will notify you of any material changes by posting the new Privacy Policy on the Sites. You should consult this Privacy Policy regularly for any changes.") }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('1. Your Acceptance') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __('BY USING AND/OR VISITING THIS WEBSITE (collectively, including all Content available through the MyNovelHub.com domain name, the "MyNovelHub Website", or "Website"), YOU SIGNIFY YOUR ASSENT TO TERMS OF USE, WHICH ARE PUBLISHED AT http://www.MyNovelHub.com/terms-of-service AND WHICH ARE INCORPORATED HEREIN BY REFERENCE. If you do not agree to any of these terms, then please do not use the MyNovelHub Website.') }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('2. MyNovelHub Website') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __("These Terms of Use apply to all users of the MyNovelHub Website, including users who are also contributors of novel content, information, and other materials or services on the Website. The MyNovelHub Website may contain links to third party websites that are not owned or controlled by MyNovelHub. MyNovelHub has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party websites. In addition, MyNovelHub will not and cannot censor or edit the content of any third-party site. By using the Website, you expressly relieve MyNovelHub from any and all liability arising from your use of any third-party website. Accordingly, we encourage you to be aware when you leave the MyNovelHub Website and to read the terms and conditions and privacy policy of each other website that you visit.") }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('3. Website Access') }}
        </h3>
    </div>
    <p class="block-desc">A. MyNovelHub hereby grants you permission to use the Website as set forth in this Terms
        of Use, provided that:</p>

    <p class="block-desc">(i) Your use of the Website as permitted is solely for your personal, noncommercial use;</p>
    <p class="block-desc">(ii) You will not copy or distribute any part of the Website in any medium without
        MyNovelHub's prior written authorization;</p>
    <p class="block-desc">(iii) You will not alter or modify any part of the Website other than as may be reasonably
        necessary to use the Website for its intended purpose;</p>
    <p class="block-desc">(iv) You will otherwise comply with the terms and conditions of these Terms of Use.</p>

    <p class="block-desc">B. In order to access some features of the Website, you will have to create an account. You
        may never use another's account without permission. When creating your account, you must provide accurate and
        complete information. You are solely responsible for the activity that occurs on your account, and you must keep
        your account password secure. You must notify MyNovelHub immediately of any breach of security or
        unauthorized use of your account. Although MyNovelHub will not be liable for your losses caused by any
        unauthorized use of your account, you may be liable for the losses of MyNovelHub or others due to such
        unauthorized use.</p>
    <p class="block-desc">C. You agree not to use or launch any automated system, including without limitation,
        "robots," "spiders," "offline readers," etc., that accesses the Website in a manner that sends more request
        messages to the MyNovelHub servers in a given period of time than a human can reasonably produce in the same
        period by using a convention on-line web browser. Notwithstanding the foregoing, MyNovelHub grants the
        operators of public search engines permission to use spiders to copy materials from the site for the sole
        purpose of creating publicly available searchable indices of the materials, but not caches or archives of such
        materials. MyNovelHub reserves the right to revoke these exceptions either generally or in specific cases.
        You agree not to collect or harvest any personally identifiable information, including account names, from the
        Website, nor to use the communication systems provided by the Website for any commercial solicitation purposes.
        You agree not to solicit, for commercial purposes, any users of the Website with respect to their User
        Submissions.</p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('4. User Submissions') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __('A. The MyNovelHub Website may now or in the future permit the submission of novel or other communications submitted by you and other users ("User Submissions") and the hosting, sharing, and/or publishing of such User Submissions. You understand that whether or not such User Submissions are published, MyNovelHub does not guarantee any confidentiality with respect to any submissions.') }}
    </p>

    <p class="block-desc">
        {{ __('B. You shall be solely responsible for your own User Submissions and the consequences of posting or publishing them. In connection with User Submissions, you affirm, represent, and/or warrant that:') }}
    </p>

    <p class="block-desc">
        {{ __('(i) You own or have the necessary licenses, rights, consents, and permissions to use and authorize MyNovelHub to use all patent, trademark, trade secret, copyright or other proprietary rights in and to any and all User Submissions to enable inclusion and use of the User Submissions in the manner contemplated by the Website and these Terms of Use;') }}
    </p>

    <p class="block-desc">
        {{ __("(ii) You have the written consent, release, and/or permission of each and every identifiable individual person in the User Submission to use the name or likeness of each and every such identifiable individual person to enable inclusion and use of the User Submissions in the manner contemplated by the Website and these Terms of Use. For clarity, you retain all of your ownership rights in your User Submissions. However, by submitting the User Submissions to MyNovelHub, you hereby grant MyNovelHub a worldwide, non-exclusive, royalty-free, sublicense-able and transferable license to use, reproduce, distribute, prepare derivative works of, display, and perform the User Submissions in connection with the MyNovelHub Website and MyNovelHub's (and its successor's) business, including without limitation for promoting and redistributing part or all of the MyNovelHub Website (and derivative works thereof) in any media formats and through any media channels. You also hereby grant each user of the MyNovelHub Website a non-exclusive license to access your User Submissions through the Website, and to use, reproduce, distribute, prepare derivative works of, display and perform such User Submissions as permitted through the functionality of the Website and under these Terms of Use. The foregoing license granted by you terminates once you remove or delete a User Submission from the MyNovelHub Website.") }}
    </p>

    <p class="block-desc">
        {{ __('C. In connection with User Submissions, you further agree that you will not:') }}
    </p>

    <p class="block-desc">
        {{ __('(i) Submit material that is copyrighted, protected by trade secret or otherwise subject to third party proprietary rights, including privacy and publicity rights, unless you are the owner of such rights or have permission from their rightful owner to post the material and to grant MyNovelHub all of the license rights granted herein;') }}
    </p>

    <p class="block-desc">
        {{ __('(ii) Publish falsehoods or misrepresentations that could damage MyNovelHub or any third party;') }}
    </p>

    <p class="block-desc">
        {{ __('(iii) Submit material that is unlawful, obscene, defamatory, libelous, threatening, pornographic, harassing, hateful, racially or ethnically offensive, or encourages conduct that would be considered a criminal offense, give rise to civil liability, violate any law, or is otherwise inappropriate;') }}
    </p>

    <p class="block-desc">{{ __('(iv) Post advertisements or solicitations of business;') }}</p>

    <p class="block-desc">
        {{ __('D. In particular, if you are a copyright owner or an agent thereof and believe that any User Submission or other content infringes upon your copyrights, you may submit a notification pursuant to the Digital Millennium Copyright Act ("DMCA") by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):') }}
    </p>

    <p class="block-desc">
        {{ __('(i) A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed;') }}
    </p>

    <p class="block-desc">
        {{ __('(ii) Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at that site;') }}
    </p>

    <p class="block-desc">
        {{ __('(iii) Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled and information reasonably sufficient to permit the service provider to locate the material;') }}
    </p>

    <p class="block-desc">
        {{ __('(iv) Information reasonably sufficient to permit the service provider to contact you, such as an address, telephone number, and, if available, an electronic mail;') }}
    </p>

    <p class="block-desc">
        {{ __('(v) A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law;') }}
    </p>

    <p class="block-desc">
        {{ __('(vi) A statement that the information in the notification is accurate, and under penalty of perjury, that you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.') }}
    </p>
    <p class="block-desc">
        {{ __("MyNovelHub's designated Copyright Agent to receive notifications of claimed infringement is:
        copyright@MyNovelHub.com. For clarity, only DMCA notices should go to the Copyright Agent; any other feedback,
        comments, requests for technical support, and other communications should be directed to MyNovelHub customer
        service. You acknowledge that if you fail to comply with all of the requirements of this Section 5(D), your DMCA
        notice may not be valid.") }}
    </p>

    <p class="block-desc">
        {{ __('E. You understand that when using the MyNovelHub Website, you will be exposed to User Submissions from a variety of sources, and that MyNovelHub is not responsible for the accuracy, usefulness, safety, or intellectual property rights of or relating to such User Submissions. You further understand and acknowledge that you may be exposed to User Submissions that are inaccurate, offensive, indecent, or objectionable, and you agree to waive, and hereby do waive, any legal or equitable rights or remedies you have or may have against MyNovelHub with respect thereto, and agree to indemnify and hold MyNovelHub, its Owners/Operators, affiliates, and/or licensors, harmless to the fullest extent allowed by law regarding all matters related to your use of the site.') }}
    </p>

    <p class="block-desc">
        {{ __('F. MyNovelHub permits you to link to materials on the Website for personal, non-commercial purposes only. MyNovelHub reserves the right to discontinue any aspect of the MyNovelHub Website at any time.') }}
    </p>

    <div class="block-header">
        <h3 class="block-title">
            {{ __('5. Warranty Disclaimer') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __("You agree that your use of the MyNovelHub website shall be at your sole risk. to the fullest extent permitted by law, MyNovelHub, its officers, directors, employees, and agents disclaim all warranties, express or implied, in connection with the website and your use thereof. MyNovelHub makes no warranties or representations about the accuracy or completeness of this site's content or the content of any sites linked to this site and assumes no liability or responsibility for any") }}
    </p>

    <p class="block-desc">{{ __('(i) Errors, mistakes, or inaccuracies of content,') }}</p>

    <p class="block-desc">
        {{ __('(ii) Personal injury or property damage, of any nature whatsoever, resulting from your access to and use of our website,') }}
    </p>

    <p class="block-desc">
        {{ __('(iii) Any unauthorized access to or use of our secure servers and/or any and all personal information and/or financial information stored therein,') }}
    </p>

    <p class="block-desc">{{ __('(iv) Any interruption or cessation of transmission to or from our website,') }}</p>

    <p class="block-desc">
        {{ __('(v) Any bugs, viruses, trojan horses, or the like which may be transmitted to or through our website by any third party,') }}
    </p>

    <p class="block-desc">
        {{ __('(vi) Any errors or omissionsin any content or for any loss or damage of any kind incurred as a result of the use of any content posted, emailed, transmitted, or otherwise made available via the MyNovelHub website. MyNovelHub does not warrant, endorse, guarantee, or assume responsibility for any product or service advertised or offered by a third party through the MyNovelHub website or any hyperlinked website or featured in any banner or other advertising, and MyNovelHub will not be a party to or in any way be responsible for monitoring any transaction between you and third-party providers of products or services. as with the purchase of a product or service through any medium or in any environment, you should use your best judgment and exercise caution where appropriate.') }}
    </p>

    <div class="block-header">
        <h3 class="block-title">
            {{ __('6. Limitation of Liability') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __('In no event shall MyNovelHub, its officers, directors, employees, or agents, be liable to you for any direct, indirect, incidental, special, punitive, or consequential damages whatsoever resulting from any') }}
    </p>

    <p class="block-desc">{{ __('(i) Errors, mistakes, or inaccuracies of content,') }}</p>

    <p class="block-desc">
        {{ __('(ii) Personal injury or property damage, of any nature whatsoever, resulting from your access to and use of our website,') }}
    </p>

    <p class="block-desc">
        {{ __('(iii) Any unauthorized access to or use of our secure servers and/or any and all personal information and/or financial information stored therein,') }}
    </p>

    <p class="block-desc">
        {{ __('(iv) Any interruption or cessation of transmission to or from our website, any bugs, viruses, trojan horses, or the like, which may be transmitted to or through our website by any third party,') }}
    </p>

    <p class="block-desc">
        {{ __('(v) Any errors or omissions in any content or for any loss or damage of any kind incurred as a result of your use of any content posted, emailed, transmitted, or otherwise made available via the MyNovelHub website, whether based on warranty, contract, tort, or any other legal theory, and whether or not the company is advised of the possibility of such damages. the foregoing limitation of liability shall apply to the fullest extent permitted by law in the applicable jurisdiction.') }}
    </p>

    <p class="block-desc">
        {{ __('You specifically acknowledge that MyNovelHub shall not be liable for user submissions or the defamatory, offensive, or illegal conduct of any third party and that the risk of harm or damage from the foregoing rests entirely with you.') }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('7. Indemnity') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __("You agree to defend, indemnify and hold harmless MyNovelHub, its parent corporation, officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees) arising from:") }}
    </p>

    <p class="block-desc">{{ __('(i) Your use of and access to the MyNovelHub Website;') }}</p>

    <p class="block-desc">{{ __('(ii) Your violation of any term of these Terms of Use;') }}</p>

    <p class="block-desc">
        {{ __('(iii) Your violation of any third party right, including without limitation any copyright, property, or privacy right;') }}
    </p>

    <p class="block-desc">{{ __('(iv) any claim that one of your User Submissions caused damage to a third party.') }}
    </p>

    <p class="block-desc">
        {{ __('This defense and indemnification obligation will survive these Terms of Service and your use of the MyNovelHub Website.') }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('8. Ability to Accept Terms of Use') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __('You affirm that you are either more than 18 years of age, or an emancipated minor, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Service, and to abide by and comply with these Terms of Service. In any case, you affirm that you are over the age of 13, as the MyNovelHub Website is not intended for children under 13. If you are under 13 years of age, then please do not use the MyNovelHub Website-there are lots of other great web sites for you. Talk to your parents about what sites are appropriate for you.') }}
    </p>
    <div class="block-header">
        <h3 class="block-title">
            {{ __('9. Assignment') }}
        </h3>
    </div>
    <p class="block-desc">
        {{ __('These Terms of Use, and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by MyNovelHub without restriction.') }}
    </p>
</div>
@endsection
