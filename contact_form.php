<div class="space-y-8 bg-gray-800 p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-semibold text-blue-500 mb-8 text-center">Contactez-moi</h2>
    <form action="send_message.php" method="post" class="space-y-6">
        <div>
            <label for="name" class="block text-sm text-gray-200">Votre nom</label>
            <input type="text" id="name" name="name" required class="w-full p-4 bg-gray-600 text-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="email" class="block text-sm text-gray-200">Votre email</label>
            <input type="email" id="email" name="email" required class="w-full p-4 bg-gray-600 text-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="subject" class="block text-sm text-gray-200">Sujet</label>
            <select id="subject" name="subject" required class="w-full p-4 bg-gray-600 text-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Demande de renseignements">Demande de renseignements</option>
                <option value="Déclaration d'impôts">Déclaration d'impôts</option>
                <option value="Gestion des entreprises">Gestion des entreprises</option>
                <option value="Administratif Général">Administratif Général</option>
                <option value="Aide Internet">Aide Internet</option>
                <option value="Rédactions de CV & Lettres de motivations">Rédaction de CV & Lettres de motivations</option>
                <option value="Corrections / Relecture de textes">Corrections / Relecture de textes</option>
                <option value="Site Web">Site Web</option>
                <option value="Soutien Scolaire">Soutien Scolaire</option>
                <option value="Autre">Autre</option>
            </select>
        </div>
        <div>
            <label for="message" class="block text-sm text-gray-200">Message</label>
            <textarea id="message" name="message" rows="5" required class="w-full p-4 bg-gray-600 text-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg shadow-md hover:bg-blue-500">Envoyer</button>
    </form>
</div>
