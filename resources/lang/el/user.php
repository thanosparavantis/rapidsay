<?php

return [

    'placement'             => 'θέση',
    'reputation'            => 'φήμη',
    'subscribers'           => 'συνδρομή|συνδρομητές',
    'data-loss'             => 'Είστε σίγουροι ότι θέλετε να απορρίψετε όλες τις αλλαγές σας;',
    'banned'                => 'Αποκλεισμένος',

    'profile'                   => [
        'activity'              => 'Δραστηριότητα',
        'empty'                 => 'Δεν φαίνεται να υπάρχει κάτι εδώ',
        'picture'               => 'Φωτογραφία προφίλ του :name',
        'online'                => 'Συνδεδεμένος',
        'banned'                => 'Ο χρήστης :name έχει αποκλειστεί λόγω παραβίασης των Όρων Χρήσης.'
    ],

    'notifications'             => [
        'none'                  => 'Δεν υπάρχουν ειδοποιήσεις αυτή τη στιγμή.',
    ],

    'preferences'               => [
        'update_profile'            => 'Ενημέρωση Προφίλ',
        'change_password'           => 'Αλλαγή Κωδικού',
        'remove_profile_picture'    => 'Αφαίρεση φωτογραφίας προφίλ',
        'profile_picture_removed'   => 'Η φωτογραφία προφίλ σας έχει αφαιρεθεί.',
        'updated'                   => 'Οι ρυθμήσεις σας έχουν ενημερωθεί.',
    ],

    'privacy'                   => [
        'notifications'         => [
            'title'             => 'Να μου αποστέλλετε email υπενθύμισης για νέες ειδοποιήσεις.',
            'description'       => 'Αυτό σημαίνει ότι θα λαμβάνετε ένα email κάθε Παρασκευή, όταν έχετε νέες ειδοποιήσεις.',
        ],
        'email'                 => [
            'title'             => 'Να φαίνεται η διεύθυνση email στο προφίλ μου.',
            'description'       => 'Αυτό σημαίνει ότι η διεύθυνση email που χρησιμοποιήσεται κατά την εγγραφή θα είναι δημόσια στο προφίλ σας (<strong>:email</strong>).',
        ],
        'ratings'               => [
            'title'             => 'Να φαίνεται υλικό στο οποίο έχω δώσει βαθμό στο προφίλ μου.',
            'description'       => 'Αυτό σημαίνει ότι το τμήμα στο οποίο φαίνονται οι βαθμοί που έχετε δώσει σε αναρτήσεις, σχόλια και απαντήσεις στο προφίλ σας, θα είναι δημόσια.',
        ],
        'online'                => [
            'title'             => 'Να φαίνεται πότε είμαι συνδεδεμένος.',
            'description'       => 'Αυτό σημαίνει ότι όταν είστε συνδεδεμένος, ένας πράσινος κύκλος θα φαίνεται δημόσια πάνω στη φωτογραφία προφίλ σας.',
        ],
        'update'                => 'Ενημέρωση ρυθμίσεων απορρήτου',
        'updated'               => 'Οι ρυθμίσεις απορρήτου σας έχουν ενημερωθεί.',
        'private'               => 'Αυτό το τμήμα μόνο εσείς μπορείτε να το δείτε.',
    ],

    'password'                  => [
        'same'                  => 'Ο νέος κωδικός σας δεν μπορεί να είναι ο ίδιος με τον τωρινό.',
        'updated'               => 'Ο κωδικός σας έχει αλλάξει, θυμηθείτε να χρησιμοποιήσεται τον καινούργιο όταν ξανασυνδεθείται.',
        'incorrect'             => 'Ο τωρινός κωδικός που βάλατε δεν είναι σωστός.'
    ],

    'subscription'              => [
        'none'                  => 'Δεν βρέθηκαν συνδρομές',
        'subscribed'            => 'Γίνατε συνδρομητής του :name.',
        'unsubscribed'          => 'Σταματήσατε να είστε συνδρομητής του :name.',
    ],

    'button'                => [
        'subscribe'         => 'Συνδρομή',
        'unsubscribe'       => 'Διακοπή Συνδρομής',
    ],

    'email'                 => [
        'notifications'     => [
            'subject'           => 'Έχετε :unread νέα ειδοποιήση|Έχετε :unread νέες ειδοποιήσεις',
            'greeting'          => 'Γεια σας <strong>:name</strong>,',
            'about'             => 'Έχετε <strong>:unread</strong> νέα ειδοποιήση που μπορεί να θέλετε να δείτε.|Έχετε <strong>:unread</strong> νέες ειδοποιήσεις που μπορεί να θέλετε να δείτε.',
            'about-link'        => 'Πατήστε εδώ για να δείτε τις ειδοποιήσεις σας.',
            'unsubscribe'       => 'Εάν δεν θέλετε να λαμβάνετε αυτό το email, :link.',
            'unsubscribe-link'  => 'πατήστε εδώ για να διακοπεί η συνδρομή σας',
        ],
    ],
];
