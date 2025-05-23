<?php

return [
    'password' => [
        'reset' => 'Vaše geslo je bilo ponastavljeno!',
        'sent' => 'Poslali smo vam povezavo za ponastavitev gesla!',
        'throttled' => 'Počakajte, prosim, preden poskusite znova.',
        'token' => 'Ta ponastavitveni žeton ni veljaven.',
        'user' => "Ne moremo najti uporabnika z tem e-naslovom.",
    ],

      'accepted' => ':attribute mora biti sprejet.',
    'active_url' => ':attribute ni veljaven URL.',
    'after' => ':attribute mora biti po datumu :date.',
    'after_or_equal' => ':attribute mora biti enak ali po datumu :date.',
    'alpha' => ':attribute lahko vsebuje samo črke.',
    'alpha_dash' => ':attribute lahko vsebuje samo črke, številke, pomišljaje in podčrtaje.',
    'alpha_num' => ':attribute lahko vsebuje samo črke in številke.',
    'array' => ':attribute mora biti seznam (array).',
    'before' => ':attribute mora biti pred datumom :date.',
    'before_or_equal' => ':attribute mora biti enak ali pred datumom :date.',
    'between' => [
        'numeric' => ':attribute mora biti med :min in :max.',
        'file' => ':attribute mora biti med :min in :max kilobajti.',
        'string' => ':attribute mora biti med :min in :max znaki.',
        'array' => ':attribute mora imeti med :min in :max elementov.',
    ],
    'boolean' => ':attribute polje mora biti true ali false.',
    'confirmed' => ':attribute potrditev se ne ujema.',
    'date' => ':attribute ni veljaven datum.',
    'date_equals' => ':attribute mora biti enak datumu :date.',
    'date_format' => ':attribute se ne ujema z obliko :format.',
    'different' => ':attribute in :other morata biti različna.',
    'digits' => ':attribute mora imeti :digits številk.',
    'digits_between' => ':attribute mora biti med :min in :max številkami.',
    'email' => ':attribute mora biti veljaven e-naslov.',
    'exists' => 'Izbran :attribute ni veljaven.',
    'file' => ':attribute mora biti datoteka.',
    'filled' => ':attribute polje mora biti izpolnjeno.',
    'gt' => [
        'numeric' => ':attribute mora biti večji od :value.',
        'file' => ':attribute mora biti večji od :value kilobajtov.',
        'string' => ':attribute mora biti večji od :value znakov.',
        'array' => ':attribute mora imeti več kot :value elementov.',
    ],
    'gte' => ':attribute mora biti večji ali enak :value.',
    'image' => ':attribute mora biti slika.',
    'in' => 'Izbran :attribute ni veljaven.',
    'in_array' => ':attribute ne obstaja v :other.',
    'integer' => ':attribute mora biti celo število.',
    'ip' => ':attribute mora biti veljaven IP naslov.',
    'ipv4' => ':attribute mora biti veljaven IPv4 naslov.',
    'ipv6' => ':attribute mora biti veljaven IPv6 naslov.',
    'json' => ':attribute mora biti veljaven JSON niz.',
    'lt' => ':attribute mora biti manjši od :value.',
    'lte' => ':attribute mora biti manjši ali enak :value.',
    'max' => [
        'numeric' => ':attribute ne sme biti večji od :max.',
        'file' => ':attribute ne sme biti večji od :max kilobajtov.',
        'string' => ':attribute ne sme imeti več kot :max znakov.',
        'array' => ':attribute ne sme imeti več kot :max elementov.',
    ],
    'mimes' => ':attribute mora biti tip datoteke: :values.',
    'mimetypes' => ':attribute mora biti tip datoteke: :values.',
    'min' => [
        'numeric' => ':attribute mora biti vsaj :min.',
        'file' => ':attribute mora biti vsaj :min kilobajtov.',
        'string' => ':attribute mora imeti vsaj :min znakov.',
        'array' => ':attribute mora imeti vsaj :min elementov.',
    ],
    'not_in' => 'Izbran :attribute ni veljaven.',
    'numeric' => ':attribute mora biti številka.',
    'present' => ':attribute polje mora biti prisotno.',
    'regex' => ':attribute oblika ni veljavna.',
    'required' => ':attribute je obvezno polje.',
    'required_if' => ':attribute je obvezno, če je :other :value.',
    'required_unless' => ':attribute je obvezno, razen če je :other v :values.',
    'required_with' => ':attribute je obvezno, če je prisoten :values.',
    'required_with_all' => ':attribute je obvezno, če so prisotni :values.',
    'required_without' => ':attribute je obvezno, če :values ni prisoten.',
    'required_without_all' => ':attribute je obvezno, če noben izmed :values ni prisoten.',
    'same' => ':attribute in :other se morata ujemati.',
    'size' => [
        'numeric' => ':attribute mora biti :size.',
        'file' => ':attribute mora biti :size kilobajtov.',
        'string' => ':attribute mora imeti :size znakov.',
        'array' => ':attribute mora imeti :size elementov.',
    ],
    'string' => ':attribute mora biti niz znakov.',
    'timezone' => ':attribute mora biti veljavna časovna cona.',
    'unique' => ':attribute je že zaseden.',
    'uploaded' => ':attribute nalaganje ni uspelo.',
    'url' => ':attribute oblika ni veljavna.',

    'custom' => [],

    'attributes' => [
        'file' => 'datoteka',
        'comments' => 'komentar',
        'tags' => 'oznake',
        'entities' => 'entitete',
        'school_years' => 'šolska leta',
        'valid_from' => 'datum začetka',
        'valid_until' => 'datum konca',
        'access' => 'dostop',
    ],

];
