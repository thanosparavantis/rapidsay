<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'                => 'Τα στοιχεία αυτά δεν ταιριάζουν με κάποιο λογαριασμό.',
    'throttle'              => 'Αυτή τη στιγμή γίνονται πολλές συνδέσεις, προσπαθείστε ξανά σε :time δευτερόλεπτα.',
    'banned'                => 'Ο λογαριασμός αυτός έχει αποκλειστεί λόγω παραβίασης των Όρων Χρήσης.',
    'activation'            => [
        'email'             => [
            'subject'       => 'Ενεργοποίηση λογαριασμού',
            'alert'         => 'Σας έχουμε στείλει τον σύνδεσμο ενεργοποίησης με e-mail.',
            'body'          => [
                'greeting'  => 'Γεια σας <b>:name</b>,',
                'welcome'   => 'Καλοσωρίσατε στο ' . trans('app.name') . '.',
                'info'      => 'Πριν συνδεθείτε ο λογαριασμός σας πρέπει να ενεργοποιηθεί, για να ξέρουμε ότι είστε εσείς.',
                'link'      => 'Πατήστε εδώ για να ενεργοποιηθεί ο λογαριασμός σας.',
            ],
        ],
        'resent'            => 'Ο λογαριασμός δεν έχει ενεργοποιηθεί, ένας νέος σύνδεσμος έχει σταλεί στο :email.',
        'remind'            => 'Ο λογαριασμός δεν έχει ενεργοποιηθεί, ένας σύνδεσμος ενεργοποίησης έχει σταλεί στο :email.',
        'success'           => 'Ο λογαριασμός σας έχει ενεργοποιηθεί.',
    ]
];