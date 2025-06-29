@extends('layouts.app')

@section('content')
    <div class="h-full w-full flex flex-col items-center">
        <div class="flex flex-wrap justify-center gap-4 sm:gap-10 w-full max-w-4xl py-8">

            <a href="{{ route('adocao.show') }}">
                <div
                    class="h-full flex flex-col aspect-square w-full sm:w-[150px] bg-[#0c9d44] rounded-md p-4 sm:p-6 items-center justify-center text-center">
                    <svg height="60px" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                         fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css"> .st0 {
                                    fill: #fff;
                                } </style>
                            <g>
                                <path class="st0"
                                      d="M191.4,164.127c29.081-9.964,44.587-41.618,34.622-70.699c-9.952-29.072-41.6-44.592-70.686-34.626 c-29.082,9.956-44.588,41.608-34.632,70.69C130.665,158.582,162.314,174.075,191.4,164.127z"></path>
                                <path class="st0"
                                      d="M102.394,250.767v0.01c16.706-25.815,9.316-60.286-16.484-76.986c-25.81-16.691-60.273-9.316-76.978,16.489 v0.01c-16.695,25.805-9.306,60.268,16.495,76.958C51.236,283.957,85.694,276.573,102.394,250.767z"></path>
                                <path class="st0"
                                      d="M320.6,164.127c29.086,9.948,60.734-5.545,70.695-34.636c9.956-29.081-5.55-60.734-34.631-70.69 c-29.086-9.966-60.734,5.555-70.686,34.626C276.013,122.509,291.519,154.163,320.6,164.127z"></path>
                                <path class="st0"
                                      d="M256,191.489c-87.976,0-185.048,121.816-156.946,208.493c27.132,83.684,111.901,49.195,156.946,49.195 c45.045,0,129.813,34.489,156.945-49.195C441.048,313.305,343.976,191.489,256,191.489z"></path>
                                <path class="st0"
                                      d="M503.068,190.289v-0.01c-16.705-25.805-51.166-33.18-76.976-16.489c-25.801,16.7-33.19,51.171-16.486,76.986 v-0.01c16.7,25.806,51.158,33.19,76.968,16.481C512.374,250.557,519.764,216.095,503.068,190.289z"></path>
                            </g>
                        </g></svg>

                    <span class="mt-2 text-sm sm:text-base font-bold text-white leading-tight">
                        Adoção
                    </span>
                </div>
            </a>

            <a href="{{ route('publics.apoia-se.index') }}">
                <div
                    class="h-full flex flex-col aspect-square w-full sm:w-[150px] bg-[#0c9d44] rounded-md p-4 sm:p-6 items-center justify-center text-center">
                    <svg height="60px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                                fill="#fff"></path>
                            <path
                                d="M5 20.3884H7.25993C8.27079 20.3884 9.29253 20.4937 10.2763 20.6964C12.0166 21.0549 13.8488 21.0983 15.6069 20.8138C16.4738 20.6734 17.326 20.4589 18.0975 20.0865C18.7939 19.7504 19.6469 19.2766 20.2199 18.7459C20.7921 18.216 21.388 17.3487 21.8109 16.6707C22.1736 16.0894 21.9982 15.3762 21.4245 14.943C20.7873 14.4619 19.8417 14.462 19.2046 14.9433L17.3974 16.3084C16.697 16.8375 15.932 17.3245 15.0206 17.4699C14.911 17.4874 14.7962 17.5033 14.6764 17.5172M14.6764 17.5172C14.6403 17.5214 14.6038 17.5254 14.5668 17.5292M14.6764 17.5172C14.8222 17.486 14.9669 17.396 15.1028 17.2775C15.746 16.7161 15.7866 15.77 15.2285 15.1431C15.0991 14.9977 14.9475 14.8764 14.7791 14.7759C11.9817 13.1074 7.62942 14.3782 5 16.2429M14.6764 17.5172C14.6399 17.525 14.6033 17.5292 14.5668 17.5292M14.5668 17.5292C14.0434 17.5829 13.4312 17.5968 12.7518 17.5326"
                                stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path>
                            <rect x="2" y="14" width="3" height="8" rx="1.5" stroke="#fff"
                                  stroke-width="1.5"></rect>
                        </g>
                    </svg>

                    <span class="mt-2 text-sm sm:text-base font-bold text-white leading-tight">
                        Doação
                    </span>
                </div>
            </a>

            <a href="{{ route('public.accountability.index') }}">
                <div
                    class="h-full flex flex-col aspect-square w-full sm:w-[150px] bg-[#0c9d44] rounded-md p-4 sm:p-6 items-center justify-center text-center">
                    <svg height="60px"
                         fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3.5 3.75a.25.25 0 01.25-.25h13.5a.25.25 0 01.25.25v10a.75.75 0 001.5 0v-10A1.75 1.75 0 0017.25 2H3.75A1.75 1.75 0 002 3.75v16.5c0 .966.784 1.75 1.75 1.75h7a.75.75 0 000-1.5h-7a.25.25 0 01-.25-.25V3.75z"></path>
                            <path
                                d="M6.25 7a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm-.75 4.75a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75zm16.28 4.53a.75.75 0 10-1.06-1.06l-4.97 4.97-1.97-1.97a.75.75 0 10-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l5.5-5.5z"></path>
                        </g>
                    </svg>

                    <span class="mt-2 text-sm sm:text-base font-bold text-white leading-tight">
                        Prestação<br>de contas
                    </span>
                </div>
            </a>

            <a href="{{ route('sobre-nos.index') }}">
                <div
                    class="flex flex-col aspect-square w-full sm:w-[150px] bg-[#bc7af8] rounded-md p-4 sm:p-6 items-center justify-center text-center">
                    <img src="{{ asset('imgs/logo.jpg') }}" alt="Admin Logo"
                         class="w-16 max-h-12 sm:w-20 sm:max-h-16 object-contain mb-1">
                    <span class="text-sm sm:text-base font-bold text-white leading-tight">
                        Sobre nós
                    </span>
                </div>
            </a>

        </div>

        <section class="bg-gradient-to-r from-[#a516e6] to-[#b74bff] py-16 text-white w-full">
            <div class="container mx-auto px-4 text-center">
                <div class="max-w-4xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="p-4">
                        <p class="text-3xl font-bold mb-2">500+</p>
                        <p class="text-sm">Animais resgatados</p>
                    </div>
                    <div class="p-4">
                        <p class="text-3xl font-bold mb-2">3</p>
                        <p class="text-sm">Animais adotados por mês</p>
                    </div>
                    <div class="p-4">
                        <p class="text-3xl font-bold mb-2">5+</p>
                        <p class="text-sm">Parcerias ativas</p>
                    </div>
                    <div class="p-4">
                        <p class="text-3xl font-bold mb-2">3x</p>
                        <p class="text-sm">Por mês animais ao veterinário</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="bg-[#d3a0ed] py-12 w-full overflow-hidden">
            <div class="text-center mb-8 md:mb-12">
                <div class="inline-flex flex-col items-center relative">
                    <svg class="absolute -top-6 -left-8 w-12 h-12 text-[#ffffff33]" viewBox="0 0 24 24"
                         fill="currentColor">
                        <path
                            d="M12 4.435c-1.989-5.399-12-4.597-12 3.568 0 4.068 3.06 9.481 12 14.997 8.94-5.516 12-10.929 12-14.997 0-8.118-10-8.999-12-3.568z"/>
                    </svg>

                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#a516e6] to-[#b74bff] bg-clip-text text-transparent mb-3">
                        Conheça Nossos Animais
                    </h2>

                    <p class="text-lg md:text-xl text-white font-semibold max-w-2xl mx-auto leading-relaxed relative group">
                    <span class="bg-white/10 px-4 py-2 rounded-full">
                        Cada rabinho abanando espera por um lar cheio de amor
                        <span class="text-[#ffd700] ml-2">
                            ❤
                        </span>
                    </span>
                    </p>
                </div>
            </div>
            <div class="container mx-auto px-4">
                <div class="animais-carrossel swiper">
                    <div class="swiper-wrapper">
                        @foreach($animais as $animal)
                            <div class="swiper-slide">
                                <a href="{{ route('adocao.index', $animal->id) }}">
                                    <div class="bg-[#dcaefb] rounded-xl shadow-lg p-4 h-full mx-2">
                                        <div class="h-40 overflow-hidden rounded-lg mb-3">
                                            <img
                                                src="{{ asset('storage/animals/' . basename($animal->img_perfil)) }}"
                                                alt="{{ $animal->nome }}"
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                        <h3 class="font-bold text-gray-800 text-lg">{{ $animal->nome }}</h3>
                                        @php
                                            $nascimento = \Carbon\Carbon::parse($animal->data_nascimento);
                                            $hoje = \Carbon\Carbon::now();
                                            $diff = $nascimento->diff($hoje);

                                            $anos = $diff->y;
                                            $meses = $diff->m;
                                        @endphp

                                        <td class="border px-4 py-2 text-center">
                                            @if ($anos >= 1)
                                                {{ $anos }} {{ $anos === 1 ? 'ano' : 'anos' }}
                                            @else
                                                {{ $meses }} {{ $meses === 1 ? 'mês' : 'meses' }}
                                            @endif
                                        </td>
                                        <p class="text-gray-700 text-sm mt-2 line-clamp-2">{{ $animal->small_description }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="swiper-slide">
                            <a href="{{ route('adocao.show') }}" class="block h-full">
                                <div
                                    class="bg-[#dcaefb] rounded-xl shadow-lg p-4 h-full mx-2 flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-700 mb-3" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                                    </svg>
                                    <span class="font-semibold text-gray-800">Ver Todos</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-button-next !text-gray-700"></div>
                    <div class="swiper-button-prev !text-gray-700"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
