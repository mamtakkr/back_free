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

    'accepted' => 'The :attribute doit être accepté.',
    'accepted_if' => 'The :attribute doit être accepté lorsque :other is :value.',
    'active_url' => "The :attribute n'est pas une URL valide.",
    'after' => 'The :attribute doit être une date après :date.',
    'after_or_equal' => 'The :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'The :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'The :attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'The :attribute ne doit contenir que des lettres et des chiffres.',
    'array' => 'The :attribute doit être un tableau.',
    'before' => 'The :attribute doit être une date avant :date.',
    'before_or_equal' => 'The :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'The :attribute Doit être entre :min and :max.',
        'file' => 'The :attribute Doit être entre :min and :max kilobytes.',
        'string' => 'The :attribute Doit être entre :min and :max characters.',
        'array' => 'The :attribute doit avoir entre :min and :max items.',
    ],
    'boolean' => 'The :attribute champ doit être vrai ou faux.',
    'confirmed' => 'The :attribute la confirmation ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => "The :attribute Ce n'est pas une date valide.",
    'date_equals' => 'The :attribute doit être une date égale à :date.',
    'date_format' => 'The :attribute ne correspond pas au format :format.',
    'declined' => 'The :attribute doit être refusé.',
    'declined_if' => 'The :attribute doit être refusé lorsque :other est :value.',
    'different' => 'The :attribute et :other doit être différent.',
    'digits' => 'The :attribute doit être :digits digits.',
    'digits_between' => 'The :attribute Doit être entre :min et :max digits.',
    'dimensions' => "The :attribute a des dimensions d'image non valides.",
    'distinct' => 'The :attribute champ a une valeur en double.',
    'email' => 'The :attribute Doit être une adresse e-mail valide.',
    'ends_with' => "The :attribute doit se terminer par l'un des éléments suivants: :values.",
    'enum' => 'La sélection :attribute est invalide.',
    'exists' => 'La sélection :attribute est invalide.',
    'file' => 'The :attribute doit être un fichier.',
    'filled' => 'The :attribute le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'The :attribute doit être supérieur à :value.',
        'file' => 'The :attribute doit être supérieur à :value kilobytes.',
        'string' => 'The :attribute doit être supérieur à :value characters.',
        'array' => 'The :attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute doit être supérieur ou égal à :value.',
        'file' => 'The :attribute doit être supérieur ou égal à :value kilobytes.',
        'string' => 'The :attribute doit être supérieur ou égal à :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute doit être une image.',
    'in' => 'La sélection :attribute est invalide.',
    'in_array' => "The :attribute le champ n'existe pas dans :other.",
    'integer' => 'The :attribute Doit être un entier.',
    'ip' => 'The :attribute doit être une adresse IP valide.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute doit être inférieur à :value.',
        'file' => 'The :attribute doit être inférieur à :value kilobytes.',
        'string' => 'The :attribute doit être inférieur à :value characters.',
        'array' => 'The :attribute doit être inférieur à :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'The :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => "The :attribute le format n'est pas valide.",
    'required' => 'The :attribute Champ requis.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute doit être une chaîne.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute a déjà été pris.',
    'uploaded' => 'The :attribute échec du téléchargement.',
    'url' => 'The :attribute doit être une URL valide.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
