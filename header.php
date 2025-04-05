<header class="bg-blue-800 text-white py-8 px-6 shadow-md">
    <div class="container mx-auto flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-semibold">Jolan LANQUETIN</h1>
            <p class="mt-2 text-lg">Écrivain Public | Rédaction, Corrections & Accompagnement administratif</p>
        </div>
        <nav class="hidden md:block">
            <ul class="flex space-x-10">
                <li><a href="index.php" class="text-lg hover:text-blue-300">Accueil</a></li>
                <li><a href="qui-suis-je.php" class="text-lg hover:text-blue-300">Qui suis-je ?</a></li>
                <li><a href="services.php" class="text-lg hover:text-blue-300">Mes services</a></li>
                <li><a href="tarifs.php" class="text-lg hover:text-blue-300">Tarifs</a></li>
                <li><a href="mentions-legales.php" class="text-lg hover:text-blue-300">Mentions légales</a></li>
                <li><a href="contact.php" class="text-lg hover:text-blue-300">Contact</a></li>
            </ul>
        </nav>

        <!-- Hamburger menu pour petits écrans -->
        <button class="md:hidden text-2xl flex items-center" id="hamburger-menu">
            &#9776; <span class="ml-2">Menu</span>
        </button>
    </div>
</header>

<!-- Menu mobile (masqué par défaut, affiché lors du clic sur le hamburger) -->
<nav id="mobile-menu" class="md:hidden hidden fixed inset-0 bg-gray-800 bg-opacity-90 z-50">
    <div class="flex justify-end p-6">
        <button id="close-menu" class="text-white text-3xl">&times;</button>
    </div>
    <ul class="flex flex-col items-center space-y-6 mt-12 text-xl text-white">
        <li><a href="index.php" class="hover:text-blue-300">Accueil</a></li>
        <li><a href="qui-suis-je.php" class="hover:text-blue-300">Qui suis-je ?</a></li>
        <li><a href="services.php" class="hover:text-blue-300">Mes services</a></li>
        <li><a href="tarifs.php" class="hover:text-blue-300">Tarifs</a></li>
        <li><a href="mentions-legales.php" class="hover:text-blue-300">Mentions légales</a></li>
        <li><a href="contact.php" class="hover:text-blue-300">Contact</a></li>
    </ul>
</nav>
