<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Το :attribute δεν το έχετε αποδεχτεί.',
    'active_url'           => 'Το :attribute δεν είναι έγκυρος σύνδεσμος.',
    'after'                => 'To :attribute πρέπει να είναι ημερομηνία μετά :date.',
    'alpha'                => 'To :attribute μπορεί να περιέχει μόνο γράμματα.',
    'alpha_dash'           => 'To :attribute μπορεί να περιέχει μόνο χαρακτήρες, νούμερα και παύλες.',
    'alpha_num'            => 'To :attribute μπορεί να περιέχει μόνο χαρακτήρες και νούμερα.',
    'array'                => 'To :attribute πρέπει να είναι array.',
    'before'               => 'To :attribute πρέπει να είναι ημερομηνία πρίν :date.',
    'between'              => [
        'numeric' => 'To :attribute πρέπει να είναι μεταξύ :min και :max.',
        'file'    => 'To :attribute πρέπει να είναι μεταξύ :min και :max kilobytes.',
        'string'  => 'To :attribute πρέπει να είναι μεταξύ :min και :max χαρακτήρων.',
        'array'   => 'To :attribute πρέπει να είναι μεταξύ :min και :max στοιχείων.',
    ],
    'boolean'              => 'To :attribute πρέπει να είναι αληθές ή ψευδές.',
    'confirmed'            => 'Η επαλήθευση του :attribute δεν είναι σωστή.',
    'date'                 => 'To :attribute δεν είναι σωστή ημερομηνία.',
    'date_format'          => 'To :attribute δεν αντιστοιχεί με την μορφή :format.',
    'different'            => 'To :attribute και :other πρέπει να είναι διαφορετικά.',
    'digits'               => 'To :attribute πρέπει να έχει :digits ψηφία.',
    'digits_between'       => 'To :attribute πρέπει να είναι μεταξύ :min και :max ψηφίων.',
    'dimensions'           => 'To :attribute έχει λάθος διαστάσεις εικόνας.',
    'distinct'             => 'To :attribute πεδίο έχει διπλό στοιχείο.',
    'email'                => 'To :attribute πρέπει να είναι μια διεύθυνση email.',
    'exists'               => 'Το επιλεγμένο :attribute είναι λάθος.',
    'file'                 => 'To :attribute πρέπει να είναι αρχείο.',
    'filled'               => 'To :attribute πεδίο είναι υποχρεωτικό.',
    'image'                => 'To :attribute πρέπει να είναι εικόνα.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'To :attribute πεδίο δεν υπάρχει στο :other.',
    'integer'              => 'To :attribute πρέπει να είναι νούμερο.',
    'ip'                   => 'To :attribute πρέπει να είναι έγκυρη διεύθυνση IP.',
    'json'                 => 'To :attribute πρέπει να είναι ένα έγκυρο κείμενο JSON.',
    'max'                  => [
        'numeric' => 'To :attribute δεν μπορεί να έχει πάνω από :max.',
        'file'    => 'To :attribute δεν μπορεί να έχει πάνω από :max kilobytes.',
        'string'  => 'To :attribute δεν μπορεί να έχει πάνω από :max χαρατήρες.',
        'array'   => 'To :attribute δεν μπορεί να έχει πάνω από :max στοιχεία.',
    ],
    'mimes'                => 'To αρχείο πρέπει να είναι ένας από τους τύπους: :values.',
    'min'                  => [
        'numeric' => 'To :attribute πρέπει να είναι τουλάχιστον :min.',
        'file'    => 'To :attribute πρέπει να είναι τουλάχιστον :min kilobytes.',
        'string'  => 'To :attribute πρέπει να έχει τουλάχιστον :min χαρακτήρες.',
        'array'   => 'To :attribute πρέπει να έχει τουλάχιστον :min στοιχεία.',
    ],
    'not_in'               => 'Το επιλεγμένο :attribute είναι λάθος.',
    'numeric'              => 'To :attribute πρέπει να είναι υπάρχει.',
    'present'              => 'To :attribute πεδίο πρέπει να υπάρχει.',
    'regex'                => 'To :attribute δεν είναι σε σωστή μορφή.',
    'required'             => 'To :attribute είναι υποχρεωτικό.',
    'required_if'          => 'To :attribute είναι υποχρεωτικό όταν :other είναι :value.',
    'required_unless'      => 'To :attribute είναι υποχρεωτικό εκτός εάν :other είναι στο :values.',
    'required_with'        => 'To :attribute είναι υποχρεωτικό όταν :values υπάρχει.',
    'required_with_all'    => 'To :attribute είναι υποχρεωτικό όταν :values υπάρχει.',
    'required_without'     => 'To :attribute είναι υποχρεωτικό όταν :values δεν υπάρχει.',
    'required_without_all' => 'To :attribute είναι υποχρεωτικό όταν τίποτα από :values υπάρχει.',
    'same'                 => 'To :attribute και το :other πρέπει να είναι ίδια.',
    'size'                 => [
        'numeric' => 'To :attribute πρέπει να είναι :size.',
        'file'    => 'To :attribute πρέπει να είναι :size kilobytes.',
        'string'  => 'To :attribute πρέπει να είναι :size χαρακτήρων.',
        'array'   => 'To :attribute πρέπει να περιέχει :size στοιχεία.',
    ],
    'string'               => 'Το :attribute πρέπει να είναι κείμενο',
    'timezone'             => 'Το :attribute πρέπει να είναι μια σωστή ζώνη ώρας.',
    'unique'               => 'Το :attribute χρησιμοποιείται ήδη.',
    'url'                  => 'Το :attribute πρέπει να είναι σε σωστή μορφή',
    'trans_key'            => 'Το :attribute πρέπει να είναι ένα έγκυρο κλειδί μετάφρασης.',
    'honeypot'             => 'Το περιεχόμενο αυτής της φόρμας φαίνεται να είναι spam, παρακαλούμε προσπαθήστε ξανά.',
    'honeytime'            => 'Η φόρμα υποβλήθηκε πολύ γρήγορα, παρακαλούμε προσπαθήστε ξανά.',
    'captcha'              => 'Το captcha δεν είναι σωστό, παρακαλούμε προσπαθήστε ξανά.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'username' => [
            'required' => 'Το ψευδώνυμο είναι υποχρεωτικό.',
            'alpha_num' => 'To ψευδώνυμο μπορεί να περιέχει μόνο χαρακτήρες και νούμερα.',
            'max'  => 'To ψευδώνυμο δεν μπορεί να έχει πάνω από :max χαρατήρες.',
            'unique' => 'Το ψευδώνυμο χρησιμοποιείται ήδη.',
        ],
        'email' => [
            'required' => 'Η διεύθυνση email είναι υποχρεωτική.',
            'email' => 'Η διεύθυνση email πρέπει να είναι σε σωστή μορφή.',
            'max'  => 'Ή διεύθυνση email δεν μπορεί να έχει πάνω από :max χαρατήρες.',
            'unique' => 'Ή διεύθυνση email χρησιμοποιείται ήδη.',
        ],
        'search' => [
            'required' => 'Το πεδίο της αναζήτησης είναι υποχρεωτικό.',
        ],
        'title' => [
            'required' => 'Ο τίτλος είναι υποχρεωτικός.',
            'between' => 'Ο τίτλος πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'edit_title' => [
            'required' => 'Ο τίτλος είναι υποχρεωτικός.',
            'between' => 'Ο τίτλος πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'edit_body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'comment_body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'comment_edit_body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'reply_body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'reply_edit_body' => [
            'required' => 'Το περιεχόμενο είναι υποχρεωτικό.',
            'between' => 'Το περιεχόμενο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.'
        ],
        'password' => [
            'required' => 'Ο κωδικός είναι υποχρεωτικός.',
            'confirmed' => 'Η επαλήθευση του κωδικού δεν είναι σωστή.'
        ],
        'password_confirmation' => [
            'required' => 'Ο κωδικός επαλήθευσης είναι υποχρεωτικός.'
        ],
        'current_password' => [
            'required' => 'Ο τωρινός κωδικός είναι υποχρεωτικός.'
        ],
        'first_name' => [
            'alpha' => 'To όνομα μπορεί να περιέχει μόνο γράμματα.',
            'max' => 'To όνομα πρέπει να είναι μεταξύ :min και :max χαρακτήρων.',
        ],
        'last_name' => [
            'alpha' => 'To επίθετο μπορεί να περιέχει μόνο γράμματα.',
            'max' => 'To επίθετο πρέπει να είναι μεταξύ :min και :max χαρακτήρων.',
        ],
        'description' => [
            'required' => 'Η περιγραφή είναι υποχρεωτική.',
            'max' => 'Η περιγραφή πρέπει να είναι μεταξύ :min και :max χαρακτήρων.',
        ],
        'profile_picture' => [
            'mimes' => 'Η φωτογραφία προφίλ πρέπει να είναι ένας από τους τύπους: :values.',
        ],
        'announcement_key' => [
            'required' => 'Το κείμενο της ανακοίνωσης είναι υποχρεωτικό.',
            'trans_key' => 'Το κείμενο της ανακοίνωσης πρέπει να στηρίζετε έγκυρο κλειδί μετάφρασης.'
        ],
        'g-recaptcha-response' => [
            'required' => 'Το captcha είναι υποχρεωτικό.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
