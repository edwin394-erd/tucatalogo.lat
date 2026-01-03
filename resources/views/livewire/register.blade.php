<section class="bg-gradient-to-br from-yellow-50 to-indigo-100 inset-shadow-sm md:p-10  ">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <x-logo /><br>
            <div class="w-full bg-white  rounded-lg shadow-xl border border-gray-300 md:mt-0 sm:max-w-xl xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-700 md:text-2xl">
                                    Crea una cuenta
                            </h1>
                            <form class="space-y-4 md:space-y-2" wire:submit.prevent="register" novalidate>
                                 <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Catalogo / Negocio</label>
                                            <input type="text" wire:model.blur="name" name="name" id="name" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nombre del catalogo" required="">
                                            @error('name')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Tu email</label>
                                            <input type="email" wire:model.blur="email" name="email" id="email" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                                            @error('email')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="flex gap-3">

                                            <div class="w-1/2">
                                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                                                    <input type="password" wire:model.blur="password" name="password" id="password" placeholder="••••••••" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                                    @error('password')
                                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="w-1/2">
                                                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirmar contraseña</label>
                                                    <input type="password" wire:model.blur="password_confirmation" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                                    @error('confirm-password')
                                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>
                                <div class="flex gap-3">
                                        <div class="w-1/2">
                                                <label for="country" class="block mb-2 text-sm font-medium text-gray-900">País</label>
                                             @php
                                                        $countries = [
                                                                'Argentina', 'Bolivia', 'Brasil', 'Canadá', 'Chile', 'Colombia',
                                                                'Costa Rica', 'Cuba', 'Ecuador', 'El Salvador', 'España',
                                                                'Estados Unidos', 'Guatemala', 'Honduras', 'México',
                                                                'Nicaragua', 'Panamá', 'Paraguay', 'Perú', 'Puerto Rico',
                                                                'República Dominicana', 'Uruguay', 'Venezuela', 'Otro'
                                                        ];
                                                @endphp

                                                <x-select-busca
                                                        :options="$countries" 
                                                        placeholder="Selecciona un país" 
                                                        wireModel="country"
                                                />
                                                @error('country')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="w-1/2">
                                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Ciudad</label>
                                                <input type="text" wire:model.blur="city" name="city" id="city" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ciudad" required="">
                                                @error('city')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                        </div>
                                </div>
                                <div>
                                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
                                        <input type="text" wire:model.blur="address" name="address" id="address" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Dirección" required="">
                                        @error('address')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div>
                                        <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                                        <input type="tel" wire:model.blur="telephone" name="telephone" id="telephone" class="bg-gray-100 inset-shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Teléfono" required="">
                                        @error('telephone')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                </div>
                                <br>
                                    <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-100 inset-shadow-sm focus:ring-3 focus:ring-primary-300" required="">
                                            </div>
                                            
                                            <div class="ml-3 text-sm">
                                                <label for="terms" class="font-light text-gray-500">Acepto los <a class="font-medium text-primary-600 hover:underline" href="#">Términos y Condiciones</a></label>
                                            </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="shadow shadow-lg w-full text-white bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Crear una cuenta</button>
                                    <p class="text-sm font-light text-gray-500">
                                            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" wire:navigate class="font-medium text-primary-600 hover:underline">Inicia sesión aquí</a>
                                    </p>
                            </form>
                    </div>
            </div>
    </div>
</section>