<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/external.css') }}">
    <link rel="manifest" href="/manifest.json" />

</head>
<body class="landing-page">
<div class="logo-container">
    <img src="/images/logo.png" alt="">
</div>


<div class="landing-page-svg-img">
    <svg xmlns="http://www.w3.org/2000/svg" height="480pt" viewBox="-16 0 480 480" width="480pt"><path d="m72 88h336c17.671875 0 32 14.328125 32 32v264c0 17.671875-14.328125 32-32 32h-336c-17.671875 0-32-14.328125-32-32v-264c0-17.671875 14.328125-32 32-32zm0 0" fill="#348fd9"/><path d="m112 200 64 40-8-40h32c17.671875 0 32-14.328125 32-32v-80h-160c-17.671875 0-32 14.328125-32 32v75.558594c4.84375 2.878906 10.367188 4.414062 16 4.441406zm0 0" fill="#3086cd"/><path d="m42.207031 395.464844c4.71875 12.355468 16.566407 20.519531 29.792969 20.535156h336c17.671875 0 32-14.328125 32-32v-227.480469c-107.199219 142.039063-282.695312 208.929688-397.792969 238.945313zm0 0" fill="#3086cd"/><g fill="#2066a1"><path d="m328 112h16v16h-16zm0 0"/><path d="m360 112h16v16h-16zm0 0"/><path d="m392 112h16v16h-16zm0 0"/><path d="m72 144h336v16h-336zm0 0"/></g><path d="m184 184h-32l8 40-64-40h-56c-17.671875 0-32-14.328125-32-32v-112c0-17.671875 14.328125-32 32-32h144c17.671875 0 32 14.328125 32 32v112c0 17.671875-14.328125 32-32 32zm0 0" fill="#ffb531"/><path d="m203.425781 14.726562c-52.730469 80.113282-136.808593 125.96875-193.027343 149.273438 4.882812 12.066406 16.585937 19.972656 29.601562 20h56l64 40-8-40h32c17.671875 0 32-14.328125 32-32v-112c-.023438-9.921875-4.675781-19.269531-12.574219-25.273438zm0 0" fill="#ffa912"/><path d="m184 256h112c17.671875 0 32 14.328125 32 32s-14.328125 32-32 32h-112c-17.671875 0-32-14.328125-32-32s14.328125-32 32-32zm0 0" fill="#e94f4f"/><path d="m296 200h16v32h-16zm0 0" fill="#e0e0de"/><path d="m330.347656 234.34375 24-24 11.3125 11.3125-24 24.003906zm0 0" fill="#e0e0de"/><path d="m352 264h32v16h-32zm0 0" fill="#e0e0de"/><path d="m152 80v-6.03125c-.011719-14.335938-11.632812-25.957031-25.96875-25.96875h-6.03125v-16h-16v16h-6.03125c-13.175781-.082031-24.324219 9.71875-25.933594 22.796875s6.832032 25.289063 19.636719 28.402344l36.800781 9.183593c4.871094 1.230469 8.066406 5.894532 7.457032 10.882813-.609376 4.988281-4.832032 8.746094-9.859376 8.765625h-28.101562c-2.648438 0-5.1875-1.054688-7.058594-2.933594-1.871094-1.875-2.917968-4.417968-2.910156-7.066406v-6.03125h-16v6.03125c.011719 14.335938 11.632812 25.957031 25.96875 25.96875h6.03125v16h16v-16h6.03125c13.175781.082031 24.324219-9.71875 25.933594-22.796875s-6.832032-25.289063-19.636719-28.402344l-36.800781-9.183593c-4.871094-1.230469-8.066406-5.894532-7.457032-10.882813.609376-4.988281 4.832032-8.746094 9.859376-8.765625h28.0625c2.65625-.007812 5.203124 1.042969 7.082031 2.917969 1.878906 1.878906 2.933593 4.425781 2.925781 7.082031v6.03125zm0 0" fill="#f58f00"/><path d="m232 296c-26.992188.175781-53.847656-3.851562-79.601562-11.945312-.214844 1.304687-.351563 2.625-.398438 3.945312 0 17.671875 14.328125 32 32 32h112c17.671875 0 32-14.328125 32-32-.058594-3.191406-.597656-6.355469-1.601562-9.382812-30.035157 11.875-62.101563 17.78125-94.398438 17.382812zm0 0" fill="#de4242"/><path d="m354.6875 368.214844c-4.648438-.792969-9.410156.507812-13.011719 3.550781-3.601562 3.042969-5.679687 7.519531-5.675781 12.234375 0-8.835938-7.164062-16-16-16s-16 7.164062-16 16c0-8.835938-7.164062-16-16-16s-16 7.164062-16 16v-72c.179688-8.039062-5.429688-15.050781-13.3125-16.640625-4.648438-.792969-9.410156.507813-13.011719 3.550781-3.601562 3.042969-5.679687 7.519532-5.675781 12.234375v104.855469h128v-31.144531c.179688-8.039063-5.429688-15.046875-13.3125-16.640625zm0 0" fill="#1c75bd"/><path d="m272 312c.179688-8.039062-5.429688-15.050781-13.3125-16.640625-4.648438-.792969-9.410156.507813-13.011719 3.550781-3.601562 3.042969-5.679687 7.519532-5.675781 12.234375v8.855469h32zm0 0" fill="#cf3a3a"/><path d="m338.6875 368.214844c-4.648438-.792969-9.410156.507812-13.011719 3.550781-3.601562 3.042969-5.679687 7.519531-5.675781 12.234375 0-8.835938-7.164062-16-16-16s-16 7.164062-16 16c0-8.835938-7.164062-16-16-16s-16 7.164062-16 16v-72c.179688-8.039062-5.429688-15.050781-13.3125-16.640625-4.648438-.792969-9.410156.507813-13.011719 3.550781-3.601562 3.042969-5.679687 7.519532-5.675781 12.234375v120.855469l-33.351562-20c-4.144532-2.496094-9.277344-2.695312-13.601563-.527344l-1.253906.632813c-4.777344 2.394531-7.792969 7.277343-7.792969 12.621093-.003906 4.5625 2.199219 8.847657 5.910156 11.496094l50.089844 35.777344h128v-87.144531c.179688-8.039063-5.429688-15.046875-13.3125-16.640625zm0 0" fill="#fec093"/><path d="m448 384v-264c-.027344-22.082031-17.917969-39.972656-40-40h-168v16h168c13.253906 0 24 10.746094 24 24v264c0 13.253906-10.746094 24-24 24h-32v16h32c22.082031-.027344 39.972656-17.917969 40-40zm0 0"/><path d="m32 208v176c.027344 22.082031 17.917969 39.972656 40 40h72v-16h-72c-13.253906 0-24-10.746094-24-24v-176zm0 0"/><path d="m328 112h16v16h-16zm0 0"/><path d="m360 112h16v16h-16zm0 0"/><path d="m392 112h16v16h-16zm0 0"/><path d="m240 144h168v16h-168zm0 0"/><path d="m40 192h53.703125l62.058594 38.785156c2.710937 1.695313 6.171875 1.613282 8.800781-.210937s3.917969-5.039063 3.277344-8.175781l-6.078125-30.398438h22.238281c22.082031-.027344 39.972656-17.917969 40-40v-112c-.027344-22.082031-17.917969-39.9726562-40-40h-144c-22.082031.0273438-39.9726562 17.917969-40 40v112c.0273438 22.082031 17.917969 39.972656 40 40zm-24-152c0-13.253906 10.746094-24 24-24h144c13.253906 0 24 10.746094 24 24v112c0 13.253906-10.746094 24-24 24h-32c-2.402344 0-4.679688 1.078125-6.199219 2.941406-1.519531 1.859375-2.121093 4.304688-1.640625 6.660156l4.359375 21.824219-48.28125-30.210937c-1.269531-.792969-2.738281-1.214844-4.238281-1.214844h-56c-13.253906 0-24-10.746094-24-24zm0 0"/><path d="m97.96875 144h6.03125v16h16v-16h6.03125c13.175781.082031 24.324219-9.71875 25.933594-22.796875s-6.832032-25.289063-19.636719-28.402344l-36.800781-9.183593c-4.871094-1.230469-8.066406-5.894532-7.457032-10.882813.609376-4.988281 4.832032-8.746094 9.859376-8.765625h28.0625c2.65625-.007812 5.203124 1.042969 7.082031 2.917969 1.878906 1.878906 2.933593 4.425781 2.925781 7.082031v6.03125h16v-6.03125c-.011719-14.335938-11.632812-25.957031-25.96875-25.96875h-6.03125v-16h-16v16h-6.03125c-13.175781-.082031-24.324219 9.71875-25.933594 22.796875s6.832032 25.289063 19.636719 28.402344l36.800781 9.183593c4.871094 1.230469 8.066406 5.894532 7.457032 10.882813-.609376 4.988281-4.832032 8.746094-9.859376 8.765625h-28.101562c-2.648438 0-5.1875-1.054688-7.058594-2.933594-1.871094-1.875-2.917968-4.417968-2.910156-7.066406v-6.03125h-16v6.03125c.011719 14.335938 11.632812 25.957031 25.96875 25.96875zm0 0"/><path d="m155.664062 259.742188c-11.425781 11.449218-14.832031 28.65625-8.628906 43.59375 6.199219 14.941406 20.789063 24.671874 36.964844 24.664062h16v-16h-16c-13.253906 0-24-10.746094-24-24s10.746094-24 24-24h112c13.253906 0 24 10.746094 24 24s-10.746094 24-24 24h-16v16h16c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40h-112c-10.628906.007812-20.816406 4.234375-28.335938 11.742188zm0 0"/><path d="m296 200h16v32h-16zm0 0"/><path d="m330.347656 234.34375 24-24 11.3125 11.3125-24 24.003906zm0 0"/><path d="m352 264h32v16h-32zm0 0"/><path d="m169.265625 442.734375 50.085937 35.769531c1.355469.972656 2.980469 1.492188 4.648438 1.496094h128c4.417969 0 8-3.582031 8-8v-87.144531c.148438-11.941407-8.273438-22.273438-20-24.535157-6.980469-1.15625-14.117188.8125-19.511719 5.390626-.160156.128906-.3125.265624-.472656.410156-9.101563-8.171875-22.898437-8.171875-32 0-6.617187-5.675782-15.71875-7.484375-24-4.761719v-49.359375c.152344-11.941406-8.273437-22.277344-20-24.535156-6.96875-1.179688-14.101563.773437-19.496094 5.339844-5.398437 4.5625-8.507812 11.273437-8.503906 18.339843v106.726563l-21.230469-12.734375c-6.484375-3.917969-14.523437-4.21875-21.28125-.800781l-1.265625.625c-6.9375 3.472656-11.546875 10.328124-12.152343 18.0625-.605469 7.734374 2.882812 15.222656 9.195312 19.738281zm10.125-23.488281 1.257813-.621094c1.867187-.949219 4.089843-.863281 5.878906.222656l33.351562 20c2.472656 1.484375 5.546875 1.523438 8.054688.109375 2.511718-1.417969 4.0625-4.074219 4.066406-6.957031v-120.855469c0-2.347656 1.035156-4.578125 2.824219-6.097656 1.808593-1.558594 4.226562-2.21875 6.574219-1.789063 3.996093.976563 6.753906 4.632813 6.601562 8.742188v72c0 4.417969 3.582031 8 8 8s8-3.582031 8-8 3.582031-8 8-8 8 3.582031 8 8 3.582031 8 8 8 8-3.582031 8-8 3.582031-8 8-8 8 3.582031 8 8 3.582031 8 8 8 8-3.582031 8-8c0-2.351562 1.03125-4.582031 2.824219-6.105469 1.8125-1.550781 4.226562-2.203125 6.574219-1.773437 3.996093.976562 6.753906 4.625 6.601562 8.734375v79.144531h-117.441406l-48-34.28125c-1.75-1.242188-2.722656-3.316406-2.558594-5.460938.164062-2.144531 1.4375-4.046874 3.359375-5.011718zm0 0"/></svg>
</div>

<section class="headings">

    <h1 class="landing-page-header-1">Hello! Welcome</h1>
    <h3 class="landing-page-slogan">Create an account to access your budget planner.</h3>
</section>

<footer class="footer">
    <a href="{{route('register')}}" class="lets-get-started-btn">Lets Get Started</a>
    <span>Already have an account?</span><a href="{{route('login')}}" class="login-btn">Login</a>
</footer>
</body>
</html>
