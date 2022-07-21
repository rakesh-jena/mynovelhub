@extends('web')
@section('title', 'Policy | MyNovelHub')
@section('meta_keywords', 'Policy', 'Privacy')
@section('meta_description', 'Policy of our website.')

@section('content')
<div class="container box-sh mt-5 mb-5">
    <div class="block-header">
        <h3 class="block-title">{{ __('Privacy Policy') }}</h3>
    </div>
    <p class="block-desc">
        {{ __("The following webpage outlines MyNovelHub's collection and use of personal information from it's users. MyNovelHub.com values the privacy of our members and users, we will never share any personal information of anybody who logs on to MyNovelHub with anyone. This includes your e-mail address, name, and location. Upon logging on to MyNovelHub such things as your IP address and hostname are logged for statistical and security reasons.") }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{ __('Cookies') }}</h3>
    </div>
    <p class="block-desc">
        {{ __("A cookie is a very small text file placed on your system upon logging on to MyNovelHub (and most other websites). This file serves as your identification card and is uniquely yours, and can only be read by the server that gave it to you. Cookies tell us that you have returned to a specific web page on MyNovelHub and help us track your preferences and transactional habits. The basic function of cookies is to help our server remember who you are.") }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{ __("Children's Privacy") }}</h3>
    </div>
    <p class="block-desc">
        {{ __("MyNovelHub does not knowingly collect personal data from children under the age of 13. We make reasonable efforts to prevent someone who is underage from joining as a member of MyNovelHub, and will not collect information from them. If MyNovelHub learns that a child under the age of 13 has become a member, we will close that child's account and delete any information collected about the child.") }}
    </p>
    <p class="block-desc">
        {{ __("Not withstanding the foregoing, MyNovelHub may choose to retain some personal information such as the child's e-mail address as a means to prevent the child from re-registering at our website. The Children's Online Privacy Protection Act (COPPA) went into effect in April 2000, and as a result websites all over the world wide web had to change their standards to not collect any information from a child.") }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{__('Disclosing Information')}}</h3>
    </div>
    <p class="block-desc">
        {{ __("MyNovelHub may store and disclose personal information allowed or required by applicable law or when deemed advisable by us. This means that we may make disclosures that are necessary to conform to legal and regulatory requirements or processes and to protect the rights, safety, and property of MyNovelHub, users of the MyNovelHub website, and the public.") }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{ __('Security') }}</h3>
    </div>
    <p class="block-desc">
        {{ __("At MyNovelHub we make reasonable efforts to protect personal information such as passwords and use technology such as encryption, access control procedures, firewalls, and physical security. We urge you to use a unique password with both letters and numbers to protect your account on MyNovelHub and it's affiliated websites. If others, including family, friends or other household members access and use the message board through your login credentials, you are responsible for the actions of that individual. Only in extreme cases will your account be fully terminated.") }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{ __('Third Parties') }}</h3>
    </div>
    <p class="block-desc">
        {{ __('Third Party websites may collect information from users of MyNovelHub, this information will include your IP address, hostname, and information about your system to help us serve you better. These are purely used for statistical reasons, and will not be used in any way other thenthat. Some programs that may collect this information include: eXTReMe Tracking, Google, Nedstat, and Webalizer.') }}
    </p>
    <div class="block-header mt-4">
        <h3 class="block-title">{{__('Policy Updates') }}</h3>
    </div>
    <p class="block-desc">
        {{ __('MyNovelHub reserves the right to change this, and any other policy located on our website at anytime without notifying our users.') }}
    </p>
</div>
@endsection