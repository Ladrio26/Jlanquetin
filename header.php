<header class="bg-gradient-to-r from-blue-900 to-blue-800 text-white py-6 px-6 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo et titre -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                <span class="text-xl font-bold">JL</span>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">Jolan LANQUETIN</h1>
                <p class="text-sm md:text-base text-blue-200">Écrivain Public à Dijon</p>
            </div>
        </div>

        <!-- Navigation desktop -->
        <nav class="hidden lg:block">
            <ul class="flex items-center space-x-1">
                <li class="relative group">
                    <a href="/" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 text-lg">
                        <span class="mr-2">🏠</span>
                        Accueil
                    </a>
                </li>
                
                <li class="relative group">
                    <a href="Moi" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 text-lg">
                        <span class="mr-2">👤</span>
                        Qui suis-je ?
                    </a>
                </li>
                
                <li class="relative group">
                    <button class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 text-lg">
                        <span class="mr-2">📋</span>
                        Services
                        <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-64 bg-gray-800 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top scale-95 group-hover:scale-100">
                        <div class="py-2">
                            <a href="Services#administratif" class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">📊</span>
                                    <div>
                                        <div class="font-semibold">Administratif</div>
                                        <div class="text-sm text-gray-400">Impôts, entreprises, démarches</div>
                                    </div>
                                </div>
                            </a>
                            <a href="Services#internet" class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">💻</span>
                                    <div>
                                        <div class="font-semibold">Internet & Web</div>
                                        <div class="text-sm text-gray-400">Sites web, aide informatique</div>
                                    </div>
                                </div>
                            </a>
                            <a href="Services#redaction" class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">✍️</span>
                                    <div>
                                        <div class="font-semibold">Rédaction</div>
                                        <div class="text-sm text-gray-400">CV, lettres, corrections</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                
                <li class="relative group">
                    <a href="Tarifs" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 text-lg">
                        <span class="mr-2">💰</span>
                        Tarifs
                    </a>
                </li>
                
                <li class="relative group">
                    <a href="FAQ" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 text-lg">
                        <span class="mr-2">❓</span>
                        FAQ
                    </a>
                </li>
                
                <li class="relative group">
                    <a href="reservation" class="flex items-center px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 transition-all duration-300 text-lg font-semibold">
                        <span class="mr-2">📅</span>
                        Réservation
                    </a>
                </li>
                
                <li class="relative group">
                    <a href="Contact" class="flex items-center px-4 py-2 rounded-lg border-2 border-blue-400 hover:bg-blue-400 hover:text-white transition-all duration-300 text-lg">
                        <span class="mr-2">📞</span>
                        Contact
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Bouton mobile -->
        <button class="lg:hidden flex items-center space-x-2 bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg transition-colors duration-300" id="mobile-menu-btn">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span class="text-sm font-semibold">Menu</span>
        </button>
    </div>

    <!-- Menu mobile -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-50 opacity-0 invisible transition-all duration-300">
        <div class="absolute right-0 top-0 h-full w-80 bg-gray-900 shadow-2xl transform translate-x-full transition-transform duration-300">
            <!-- Header du menu mobile -->
            <div class="flex items-center justify-between p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-lg font-bold">JL</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold">Menu</h2>
                        <p class="text-sm text-gray-400">Navigation</p>
                    </div>
                </div>
                <button id="close-mobile-menu" class="text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation mobile -->
            <nav class="p-6">
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="flex items-center p-4 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-lg">
                            <span class="mr-3 text-xl">🏠</span>
                            Accueil
                        </a>
                    </li>
                    
                    <li>
                        <a href="Moi" class="flex items-center p-4 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-lg">
                            <span class="mr-3 text-xl">👤</span>
                            Qui suis-je ?
                        </a>
                    </li>
                    
                    <!-- Services avec sous-menu -->
                    <li class="space-y-2">
                        <button class="w-full flex items-center justify-between p-4 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-lg" id="services-mobile-btn">
                            <div class="flex items-center">
                                <span class="mr-3 text-xl">📋</span>
                                Services
                            </div>
                            <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="services-mobile-submenu" class="hidden pl-8 space-y-1">
                            <a href="Services#administratif" class="block p-3 rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">📊</span>
                                    <div>
                                        <div class="font-semibold">Administratif</div>
                                        <div class="text-sm text-gray-400">Impôts, entreprises</div>
                                    </div>
                                </div>
                            </a>
                            <a href="Services#internet" class="block p-3 rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">💻</span>
                                    <div>
                                        <div class="font-semibold">Internet & Web</div>
                                        <div class="text-sm text-gray-400">Sites web, aide</div>
                                    </div>
                                </div>
                            </a>
                            <a href="Services#redaction" class="block p-3 rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                <div class="flex items-center">
                                    <span class="mr-3">✍️</span>
                                    <div>
                                        <div class="font-semibold">Rédaction</div>
                                        <div class="text-sm text-gray-400">CV, lettres</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    
                    <li>
                        <a href="Tarifs" class="flex items-center p-4 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-lg">
                            <span class="mr-3 text-xl">💰</span>
                            Tarifs
                        </a>
                    </li>
                    
                    <li>
                        <a href="FAQ" class="flex items-center p-4 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-lg">
                            <span class="mr-3 text-xl">❓</span>
                            FAQ
                        </a>
                    </li>
                    
                    <li>
                        <a href="reservation" class="flex items-center p-4 rounded-lg bg-blue-600 hover:bg-blue-500 transition-colors duration-200 text-lg font-semibold">
                            <span class="mr-3 text-xl">📅</span>
                            Réservation
                        </a>
                    </li>
                    
                    <li>
                        <a href="Contact" class="flex items-center p-4 rounded-lg border-2 border-blue-400 hover:bg-blue-400 hover:text-white transition-colors duration-200 text-lg">
                            <span class="mr-3 text-xl">📞</span>
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Footer du menu mobile -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
                <div class="text-center space-y-2">
                    <p class="text-sm text-gray-400">📧 lanquetin.jolan@gmail.com</p>
                    <p class="text-sm text-gray-400">📧 lanquetin.jolan@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</header>
