<?php

return [

    'placement'                     => 'θέση',
    'reputation'                    => 'φήμη',
    'subscribers'                   => 'συνδρομή|συνδρομητές',
    'data-loss'                     => 'Είστε σίγουροι ότι θέλετε να απορρίψετε όλες τις αλλαγές σας;',
    'banned'                        => 'Αποκλεισμένος',

    'dashboard' => [
        'section' => [
            'account'               => 'Λογαριασμός',
            'other'                 => 'Διάφορα',
        ],

        'tips' => [
            'update-profile'        => 'Προσαρμόστε το προφίλ σας και να γράψτε ένα σύντομο βιογραφικό.',
            'change-password'       => 'Αλλάξτε τον κωδικό πρόσβασης που χρησιμοποιείτε για να συνδεθείτε στο λογαριασμό σας.',
            'privacy'               => 'Ελέγξτε τις ειδοποιήσεις που λαμβάνεται και τι βλέπουν οι άλλοι για εσάς.',
            'subscriptions'         => 'Η λίστα των χρηστών που είστε συνδρομητής τους.',
            'language'              => 'Το Rapidsay είναι διαθέσιμο σε <strong>' . count(config('languages')) . '</strong> διαφορετικές γλώσσες.',
        ],

        'account-deletion'          => '<p>Είστε έτοιμοι να αρχίσετε την <strong>οριστική διαγραφή του λογαριασμού σας</strong>. Όλα τα δεδομένα που σχετίζονται με αυτόν θα χαθούν για πάντα.</p>
                                        <ul>
                                            <li>Όλες οι αναρτήσεις, τα σχόλια και οι βαθμοί σας θα διαγραφούν.</li>
                                            <li>Οι ρυθμίσεις, θέση, φήμη, συνδρομητές και συνδρομές σας θα χαθούν.</li>
                                            <li>Οι εικόνες που έχετε μεταφορτώσει θα διαγραφούν.</li>
                                            <li>Η σελίδα προφίλ σας θα σταματήσει να υπάρχει.</li>
                                            <li>Θα σταματήσετε να λαμβάνεται ειδοποιήσεις με email.</li>
                                        </ul>
                                        <p>Μετά τη διαγραφή, δεν θα μπορείτε να συνδεθείτε με τα στοιχεία του λογαριασμού σας. <strong>Η ενέργεια αυτή δεν μπορεί να αναιρεθεί</strong>, είστε σίγουροι ότι θέλετε να συνεχίσετε;</p>',

        'button' => [
            'delete-account'        => 'Ναι, θέλω να διαγράψω το λογαριασμό μου',
            'back'                  => 'Πίσω',
            'change-password'       => 'Αλλαγή Κωδικού',
            'save-changes'          => 'Αποθήκευση Αλλαγών',
        ],

        'message' => [
            'profile-updated'       => 'Το προφίλ σας έχει ενημερωθεί.',
            'picture-removed'       => 'Η φωτογραφία προφίλ σας έχει αφαιρεθεί.',
            'password-changed'      => 'Ο κωδικός σας έχει αλλάξει.',
            'incorrect-password'    => 'Ο τωρινός κωδικός που βάλατε δεν είναι σωστός.',
            'email-notifications'   => 'Οι ειδοποιήσεις μέσω email απενεργοποιήθηκαν.',
        ],
    ],

    'profile' => [
        'activity'                  => 'Δραστηριότητα',
        'empty'                     => 'Δεν φαίνεται να υπάρχει κάτι εδώ',
        'picture'                   => 'Φωτογραφία προφίλ του :name',
        'online'                    => 'Συνδεδεμένος',
        'banned'                    => 'Ο χρήστης :name έχει αποκλειστεί λόγω παραβίασης των Όρων Χρήσης.'
    ],

    'notifications' => [
        'none'                      => 'Δεν υπάρχουν ειδοποιήσεις αυτή τη στιγμή.',
    ],

    'privacy' => [
        'notifications' => [
            'title'                 => 'Να μου αποστέλλετε email υπενθύμισης για νέες ειδοποιήσεις.',
            'description'           => 'Αυτό σημαίνει ότι θα λαμβάνετε ένα email κάθε Παρασκευή, όταν έχετε νέες ειδοποιήσεις.',
        ],
        'email' => [
            'title'                 => 'Να φαίνεται η διεύθυνση email στο προφίλ μου.',
            'description'           => 'Αυτό σημαίνει ότι η διεύθυνση email που χρησιμοποιήσεται κατά την εγγραφή θα είναι δημόσια στο προφίλ σας (<strong>:email</strong>).',
        ],
        'ratings' => [
            'title'                 => 'Να φαίνεται υλικό στο οποίο έχω δώσει βαθμό στο προφίλ μου.',
            'description'           => 'Αυτό σημαίνει ότι το τμήμα στο οποίο φαίνονται οι βαθμοί που έχετε δώσει σε αναρτήσεις, σχόλια και απαντήσεις στο προφίλ σας, θα είναι δημόσια.',
        ],
        'online' => [
            'title'                 => 'Να φαίνεται πότε είμαι συνδεδεμένος.',
            'description'           => 'Αυτό σημαίνει ότι όταν είστε συνδεδεμένος, ένας πράσινος κύκλος θα φαίνεται δημόσια πάνω στη φωτογραφία προφίλ σας.',
        ],
        'update'                    => 'Ενημέρωση ρυθμίσεων απορρήτου',
        'updated'                   => 'Οι ρυθμίσεις απορρήτου σας έχουν ενημερωθεί.',
        'private'                   => 'Αυτό το τμήμα μόνο εσείς μπορείτε να το δείτε.',
    ],

    'subscription' => [
        'none'                      => 'Δεν βρέθηκαν συνδρομές',
        'subscribed'                => 'Γίνατε συνδρομητής του :name.',
        'unsubscribed'              => 'Σταματήσατε να είστε συνδρομητής του :name.',
    ],

    'button' => [
        'subscribe'                 => 'Συνδρομή',
        'unsubscribe'               => 'Διακοπή Συνδρομής',
    ],

    'email' => [
        'notifications'     => [
            'subject'               => 'Έχετε :unread νέα ειδοποιήση|Έχετε :unread νέες ειδοποιήσεις',
            'greeting'              => 'Γεια σας <strong>:name</strong>,',
            'about'                 => 'Έχετε <strong>:unread</strong> νέα ειδοποιήση που μπορεί να θέλετε να δείτε.|Έχετε <strong>:unread</strong> νέες ειδοποιήσεις που μπορεί να θέλετε να δείτε.',
            'about-link'            => 'Πατήστε εδώ για να δείτε τις ειδοποιήσεις σας.',
            'unsubscribe'           => 'Εάν δεν θέλετε να λαμβάνετε αυτό το email, :link.',
            'unsubscribe-link'      => 'πατήστε εδώ για να διακοπεί η συνδρομή σας',
        ],
    ],
];
