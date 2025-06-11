{{--#11 & #12 & #13 & #15 & #16--}}
<div
    {{ $attributes->merge(['class' => 'test']) }}
    style="{{ $inlineStyle() }} padding: 10px; border-radius: 4px;" {{ $attributes }}>

    <h1>
        {{ $message }}
    </h1>

    {{--    #14--}}
    {{ $slot }}
</div>
