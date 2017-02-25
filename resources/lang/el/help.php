<?php

return [

    'title'             => 'Κέντρο Βοήθειας',
    'login'             => 'Μπορεί να πρέπει να <a href="' . route('login') . '">συνδεθείτε</a> για να ακολουθήσετε τις οδηγίες που βρίσκονται σε αυτή την σελίδα βοήθειας.',

    'greeting'          =>
        '<p>Γεια σας! Καλοσωρίσατε στο κέντρο βοήθειας. Εδώ μπορείτε να βρείτε απαντήσεις σε συχνές ερωτήσεις.<p>
        <p>Σε περίπτωση που χρειάζεστε επιπλέον βοήθεια ή δεν βρείτε αυτό που ψάχνετε, μπορείτε να στείλετε ένα email στη διεύθυνση <a href="mailto:' . env('MAIL_USERNAME') . '">' . env('MAIL_USERNAME') . '</a>.</p>',

    'section'           => [
        'account'       => [
            'title'     => 'Λογαριασμός',
            'article'   => [
                'not-activated'    => [
                    'title'        => 'Δεν έχω πρόσβαση στον λογαριασμό μου, επειδή δεν είναι ενεργοποιημένος.',
                    'body'         =>
                        '<p>Εάν δεν έχετε ενεργοποιήσει τον λογαριασμό σας, η σύνδεσή σας σε αυτόν είναι αδύνατη. Αυτό συμβαίνει επειδή πρέπει να επαληθεύσετε πως έχετε πρόσβαση στην διεύθυνση email που παρήχατε κατά την εγγραφή.</p>
                        <p>Κανονικά, μετά την εγγραφή, ένα email θα έχει σταλεί στην διεύθυνση email σας. Για να ενεργοποιήσετε τον λογαριασμό σας, ανοίξτε το email και ακολουθήστε τις οδηγίες που αναγράφονται.</p>
                        <p>Σε περίπτωση που δεν λάβετε το email, προσπαθήστε να συνδεθείτε ξανά μετά από <strong>24 ώρες</strong>, για να σταλεί ένα καινούργιο email ενεργοποίησης. Εάν αντιμετωπίζετε ακόμα προβλήματα, μην δυστάσετε να επικοινωνίσετε μαζί μας.</p>',
                ],
                'forgot-password'   => [
                    'title'         => 'Δεν έχω πρόσβαση στον λογαριασμό μου, επειδή ξέχασα τον κωδικό.',
                    'body'          =>
                        '<p>Έχετε την δυνατότητα να ζητήσετε επαναφορά του κωδικούς σας <a href="' . route("password-reset") . '">εδώ</a>. Μόλις εισάγετε την διεύθυνση email, θα σταλεί ένα email με τον σύνδεσμο που οδηγεί στην σελίδα επαναφοράς του κωδικού σας. Εκεί μπορείτε να ορίσετε έναν καινούργιο κωδικό και να συνδεθείτε έπειτα με αυτόν.</p>
                        <p>Σε περίπτωση που δεν λάβετε το email, δοκιμάστε ξανά ή επικοινωνίστε μαζί μας.</p>',
                ],
                'blocked'           => [
                    'title'         => 'Δεν έχω πρόσβαση στον λογαριασμό μου, επειδή είναι αποκλεισμένος.',
                    'body'          =>
                        '<p>Ένας λογαριασμός που έχει αποκλειστεί, δεν μπορεί να ξαναχρησιμοποιηθεί. Αυτό μπορεί να συμβεί, σε περίπτωση που ο χρήστης που διαχειρίζετε τον λογαριασμό παραβίασε τους <a href="' . route('terms-of-use') . '">' . trans('about.terms-of-use') . '</a>. Κανονικά, αυτή η ενέργεια δεν μπορεί να ανακληθεί, εκτός εάν ο αποκλεισμός του λογαριασμού έγινε από λάθος.</p>
                        <p>Εάν πιστεύευτε πως ο λογαριασμός σας αποκλείστικε από λάθος, παρακαλούμε επικοινωνίστε μαζί μας.</p>',
                ],
            ],
        ],

        'profile'       => [
            'title'     => 'Προφίλ',
            'article'   => [
                'customize'     => [
                    'title'     => 'Πώς μπορώ να προσαρμόσω το προφίλ μου;',
                    'body'      =>
                        '<p>Πατήστε <strong>' . (auth()->check() ? auth()->user()->fullName() : 'στο όνομά σας') . '</strong> στη μπάρα περιήγησης από πάνω για να επισκεφθήτε το προφίλ σας.</p>
                        <p>Έπειτα, πατήστε στο κουμπί <strong><i class="fa fa-cog" aria-hidden="true"></i> ' . trans('page.title.preferences') . '</strong> στα δεξιά του ονόματός σας για να πάτε στον πίνακα ελέγχου.</p>',
                ],
                'placement'     => [
                    'title'     => 'Τι είναι η κατάταξη;',
                    'body'      =>
                        '<p>Η κατάταξή σας προβάλλεται με το εικονίδιο <i class="fa fa-' . config('glyphicons.placement') . '" aria-hidden="true"></i> και αντιπροσωπεύει την θέση σας στην λίστα χρηστών.</p>
                        <p>Μπορείτε να αυξήσετε τη φήμη σας για να αποκτήσετε μια υψηλότερη θέση στην λίστα χρηστών.</p>',
                ],
                'reputation'    => [
                    'title'     => 'Τι είναι η φήμη;',
                    'body'      =>
                        '<p>Η φήμη σας προβάλλεται με το εικονίδιο <i class="fa fa-' . config('glyphicons.reputation') . '" aria-hidden="true"></i> και αντιπροσωπεύει το σύνολο των βαθμών που έχουν δώσει άλλοι χρήστες στις αναρτήσεις σας.</p>
                        <p>Όσο μεγαλύτερη είναι η φήμη, τόσο πιο διάσημο θα είναι το προφίλ σας. Για να αυξήσετε τη φήμη σας, παροτρίνουμε να είστε βοηθητικοί και να τηρείτε μια θετική στάση. Σιγουρευτείτε πως οι αναρτήσεις σας βασίζονται σε συγκεκριμένη θεματολογία, έτσι ώστε να μπορείτε να αποκτήσετε συνδρομητές με κοινά ενδιαφέροντα που θα ειδοποιούνται για τις νέες αναρτήσεις σας.</p>
                        <p>Έχετε τη δυνατότητα επίσης να αποκτήσετε φήμη με τη συμμετοχή σας σε event και διαγωνισμούς με ανταμοιβές.</p>',
                ],
            ],
        ],

        'activity'      => [
            'title'     => 'Δραστηριότητα',
            'article'   => [
                'all'           => [
                    'title'     => 'Πως μπορώ να δω όλη τη δραστηριότητά μου;',
                    'body'      =>
                        '<p>Η δραστηριότητά σας αποτελείται από όλες τις αναρτήσεις, τα σχόλια και τους βαθμούς σας. Για να επισκεφθήτε το προφίλ σας, πατήστε το <strong>' . (auth()->check() ? auth()->user()->fullName() : 'όνομά σας') . '</strong> στη μπάρα περιήγησης από πάνω.</p>
                        <p>Μην ξεχνάτε πως οι βαθμοί σας είναι ιδιωτικοί. Εάν επιθυμείτε να γίνουν δημόσιοι, μπορείτε να τροποποιήσετε τις ρυθμίσεις απορρήτου σας <a href="' . route('privacy') . '">εδώ</a>.</p>',
                ],
                'create'        => [
                    'title'     => 'Πώς μπορώ να δημιουργήσω μια ανάρτηση;',
                    'body'      =>
                        '<p>Για να δημιουργήσετε μια ανάρτηση, πατήστε το σύνδεσμο <strong><i class="fa fa-home" aria-hidden="true"></i> ' . trans('page.title.home') . '</strong> στη μπάρα περιήγησης από πάνω.</p>
                        <p>Έπειτα, εντοπίστε τη φόρμα για τη δημιουργία ανάρτησης που βρίσκεται στην κορυφή της σελίδας. Εκεί μπορείτε να γράψετε το σώμα της ανάρτησης και να μεταφορτώσετε φωτογραφίες.</p>
                        <p>Σιγουρευτείτε πως το περιεχόμενο της ανάρτησής σας δεν παραβιάζει κάποιο <a href="' . route('terms-of-use') . '">' . trans('about.terms-of-use') . '</a>. Όλες οι αναρτήσεις είναι δημόσιες και οποιοσδήποτε μπορεί να αλληλεπιδράσει με αυτές.</p>',
                ],
                'comment'       => [
                    'title'     => 'Πως μπορώ να σχολιάσω περιεχόμενο άλλων χρηστών;',
                    'body'      =>
                        '<p>Για να σχολιάσετε μια ανάρτηση, πατήστε στο κουμπί <strong>' . trans('comment.button.comment') . '</strong> κάτω από την προεπισκόπηση. Θα ανακατευθυνθείτε στη σελίδα της ανάρτηση με τη φόρμα σχολιασμού.</p>
                        <p>Μην ξεχνάτε πως μπορείτε επίσης να απαντήσετε σε άλλα σχόλια, πατώντας το κουμπί <strong>' . trans('reply.button.reply') . '</strong>.</p>
                        <p>Σιγουρευτείτε πως το περιεχόμενο της ανάρτησής σας δεν παραβιάζει κάποιο <a href="' . route('terms-of-use') . '">' . trans('about.terms-of-use') . '</a>. Όλα τα σχόλια είναι δημόσια και οποιοσδήποτε μπορεί να αλληλεπιδράσει με αυτά.</p>',
                ],
                'image'         => [
                    'title'     => 'Πως μπορώ να μεταφορτώσω εικόνες;',
                    'body'      =>
                        '<p>Μπορείτε να μεταφορτώσετε εικόνες πατώντας το εικονίδιο <i class="fa fa-' . config('glyphicons.image') . '" aria-hidden="true"></i> κάτω από κάθε φόρμα.</p>
                        <p>Για να αφαιρέσετε επιλεγμένες φωτογραφίες, πατήστε <strong>δεξί-κλίκ</strong> στο εικονίδιο <i class="fa fa-' . config('glyphicons.image') . '" aria-hidden="true"></i>.</p>
                        <p>Μπορείτε να μεταφορτώσετε μόνο 10 φωτογραφίες σε κάθε ανάρτηση και μια φωτογραφία σε κάθε σχόλιο.</p>',
                ],
                'format'        => [
                    'title'     => 'Πώς μπορώ να χρησιμοποιήσω ειδική μορφοποίηση στις αναρτήσεις μου;',
                    'body'      =>
                        '<p>Οι παρακάτω κανόνες μορφοποίησης είναι διαθέσιμοι:</p>
                        <ul>
                            <li>***bold και italics*** θα εμφανίσουν <strong><em>bold και italics</strong></em>.</li>
                            <li>**bold μόνο** θα εμφανίσουν <strong>bold μόνο</strong>.</li>
                            <li>*italics μόνο* θα εμφανίσουν <em>italics μόνο</em>.</li>
                            <li>~~deleted κείμενο~~ θα εμφανίσουν <del>deleted κείμενο</del>.</li>
                            <li><strong>[center]</strong>Centered text<strong>[/center]</strong> θα εμφανίσουν το κείμενο στη μέση της σελίδας.</li>
                            <li>www.rapidsay.com θα μετατραπεί σε ενεργό σύνδεσμο <a href="http://www.rapidsay.com">www.rapidsay.com</a>.</li>
                        </ul>

                        <p>Μην ξεχνάτε πως μπορείτε να χρησιμοποιήσετε ειδική μορφοποίηση και σε σχόλια.</p>',
                ],
            ],
        ],

        'notifications' => [
            'title'     => 'Ειδοποιήσεις',
            'article'   => [
                'view'          => [
                    'title'     => 'Πώς μπορώ να δω τις ειδοποιήσεις μου;',
                    'body'      =>
                        '<p>Για να δείτε τη λίστα των ειδοποιήσεών σας πατήστε το εικονίδιο <i class="fa fa-' . config('glyphicons.notification') . '" aria-hidden="true"></i> που βρίσκεται στη μπάρα περιήγησης από πάνω.</p>',
                ],
                'interact'      => [
                    'title'     => 'Πώς μπορώ να ξέρω αν κάποιος αλληλεπίδρασε με τις δημοσιεύσεις μου;',
                    'body'      =>
                        '<p>Όταν κάποιος αλληλεπιδρά με το δικό σας περιεχόμενο ή το προφί σας, θα λάμβάνετε μια ειδοποίηση. Ο αριθμός των νέων ειδοποιήσεων φαίνεται κοντά στο εικονίδιο <i class="fa fa-' . config('glyphicons.notification') . '" aria-hidden="true"></i>. Εάν μία ή περισσότερες ειδοποιήσεις αναφέρονται σε υλικό που έχει διαγραφεί, θα αφαιρεθούν αυτόματα.</p>
                        <p>Θα ειδοποιείστε όταν:</p>
                        <ul>
                            <li>Ένας άλλος χρήστης έδωσε βαθμό σε μια δικιά σας ανάρτηση, ένα δικό σας σχόλιο ή μια δικά σας απάντηση.</li>
                            <li>Ένας άλλος χρήστης σχολιάσει μια δικιά σας ανάρτηση.</li>
                            <li>Ένας άλλος χρήστης απαντήσεις σε ένα δικό σας σχόλιο.</li>
                            <li>Ένας άλλος χρήστης γίνει συνδρομητής σας.</li>
                            <li>Ένας διαχειριστής αποδεχτεί ή απορρίψει μια από τις αναφορές σας.</li>
                            <li>Ένας διαχειριστής επεξεργαστεί ή διαγράψει μια δικιά σας ανάρτηση ή ένα δικό σας σχόλιο.</li>
                        </ul>',
                ],
            ],
        ],

        'subscriptions' => [
            'title'     => 'Συνδρομές',
            'article'   => [
                'create'        => [
                    'title'     => 'Πώς μπορώ να γίνω συνδρομητής κάποιου χρήστη;',
                    'body'      =>
                        '<p>Εάν θέλετε να εμπλουτίσετε την αρχική σας σελίδα με περιεχόμενο που σας ενδιαφέρει, επισκεφθήτε την σελίδα <strong><i class="fa fa-trophy aria-hidden="true"></i> ' . trans('page.title.community') . '</strong> στην μπάρα περιηγήσης από πάνω που περιέχει τη λίστα εγγεγραμένων μελών. Εάν αναζητείται ένα συγκεκριμένο χρήστη, πατήστε τη σελίδα <strong><i class="fa fa-map-o aria-hidden="true"></i> ' . trans('page.title.explore') . '</strong> και κάντε μια αναζήτηση με το όνομά τους.</p>
                        <p>Για να γίνεται συνδρομητής πατήστε το κουμπί <strong><i class="fa fa-' . config('glyphicons.subscriber') . '" aria-hidden="true"></i> ' . trans('user.button.subscribe') . '</strong>. Μην ξεχνάτε, μπορείται να γίνεται συνδρομητής κατευθείαν από το προφίλ ενός χρήστη, πατόντας το ίδιο κουμπί που βρίσκεται στα δεξιά του ονόματός του.</p>',
                ],
                'delete'        => [
                    'title'     => 'Πως μπορώ να διακόψω τη συνδρομή μου σε κάποιο χρήστη;',
                    'body'      =>
                        '<p>Για να διακόψετε τη συνδρομή σας από κάποιο χρήστη, πατήστε <strong>' . (auth()->check() ? auth()->user()->fullName() : 'στο όνομά σας') . '</strong> στην μπάρα περιήγησης από πάνω. Έπειτα, πατήστε το κουμπί <strong><i class="fa fa-cog" aria-hidden="true"></i> ' . trans('page.title.preferences') . '</strong> στο δεξί μέρος του ονόματό σας. Μετά πατήστε στο σύνδεσμο <strong>' . trans('page.title.subscriptions') . '</strong> στη κορυφή, για να δείτε τη λίστα συνδρομών σας. Εκεί μπορείτε να διακόψετε τη συνδρομή σας σε ένα ή περισσότερα άτομα.</p>
                        <p>Μην ξεχνάτε πως εάν είστε ήδη στο προφίλ του χρήστη που θέλετε να διακόψετε τη συνδρομή σας, μπορείτε να πατήσετε το κουμπί <strong><i class="fa fa-times" aria-hidden="true"></i> ' . trans('user.button.unsubscribe') . '</strong> στα δεξιά του ονόματός.</p>',
                ],
            ],
        ],

        'reports'       => [
            'title'     => 'Αναφορές',
            'article'   => [
                'create'        => [
                    'title'     => 'Πως μπορώ να αναφέρω το περιεχόμενο κάποιου χρήστη;',
                    'body'      =>
                        '<p>Εάν θεωρείται πως μια συγκεκριμένη ανάρτηση ή σχόλιο παραβιάζει τους <a href="' . route('terms-of-use') . '">' . trans('about.terms-of-use') . '</a>, έχετε την επιλογή να το αναφέρεται. Για να το κάνετε αυτό, πατήστε στο κουμπί <strong><i class="fa fa-' . config('glyphicons.report') . '" aria-hidden="true"></i> ' . trans('report.button.report') . '</strong> κάτω από το περιεχόμενό τους για να ανακατευθυνθείται στη σελίδα αναφοράς. Εκεί, πρέπει να εισάγεται επιπλέον πληροφορίες που πιστεύεται πως πρέπει να ξέρουμε για την αναφορά σας. Έπειτα, πατήστε στο κουμπί <strong>' . trans('report.button.submit') . '</strong> για να υποβάλετε την αναφορά σας για επεξεργασία.</p>
                        <p>Μπορεί να περάσει λίγος χρόνος μέχρι να επεξεργαστούμε την αναφορά σας. Μόλις επεξεργαστεί, θα ειδοποιηθείται για τις ενέργειές μας στο περιεχόμενο που αναφέρατε.</p>',
                ],
            ],
        ],
    ],
];
