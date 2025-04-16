<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dnevni opomnik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            width: 90%;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h1 {
            color: #333;
            font-size: 20px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .event-list {
            margin: 15px 0;
            padding: 0;
            list-style-type: none;
        }
        .event-list li {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 8px;
            border-left: 5px solid #007BFF;
        }
        .footer {
            font-size: 13px;
            color: #777;
            margin-top: 30px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .footer img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .footer p {
            margin: 5px 0;
        }
        .small-text {
            font-size: 12px;
            color: #999;
        }
        .link {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        .footer {
    font-size: 13px;
    color: #777;
    margin-top: 30px;
    border-top: 1px solid #ddd;
    padding-top: 15px;
}

.footer-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.footer-logo img {
    max-width: 120px;
}

.footer-text {
    flex: 1;
}

.footer p {
    margin: 5px 0;
}

.footer .small-text {
    font-size: 12px;
    color: #999;
}

.footer .icon {
    font-size: 16px;
    color: #007BFF; /* Modra barva za ikone */
    margin-right: 5px;
}

.footer .link {
    color: #007BFF;
    text-decoration: none;
    font-weight: bold;
}

    </style>
</head>
<body>

    <div class="email-container">
        @if ($person->person_gender == 'male')
            <h1>Spoštovani {{ $person->person_name }}</h1>
        @else
            <h1>Spoštovana {{ $person->person_name }}</h1>  
        @endif
        <p>Vaš dnevni opomnik za dogodke na šoli.</p>
        <h3>Vaši današnji dogodki:</h3>
        @if(count($person_daily_events) > 0) 
            <ul class="event-list">
                @foreach ($person_daily_events as $event)
                    <li>
                        <strong>{{ $event->calendar_event_title }}</strong><br>
                        📅 Datum: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('d.m.Y') }} 
                        ⏰ Ura: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('H:i') }}
                    </li>
                @endforeach
            </ul>
        @else
            <small>Danes nimate načrtovanih dogodkov.</small>
        @endif
        <h3>Vaši tedenski dogodki:</h3>
        @if(count($person_weekly_events) > 0)
            <ul class="event-list">
                @foreach ($person_weekly_events as $event)
                    <li>
                        <strong>{{ $event->calendar_event_title }}</strong><br>
                        📅 Datum: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('d.m.Y') }} 
                        ⏰ Ura: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('H:i') }}
                    </li>
                @endforeach
            </ul>
        @else
            <small>Ta teden nimate načrtovanih dogodkov.</small>
        @endif
        <h3>Današnji šolski dogodki:</h3>
        @if(count($daily_events) > 0)
            <ul class="event-list">
                @foreach ($daily_events as $event)
                    <li>
                        <strong>{{ $event->calendar_event_title }}</strong><br>
                        📅 Datum: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('d.m.Y') }} 
                        ⏰ Ura: {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('H:i') }}
                    </li>
                @endforeach
            </ul>
        @else
            <small>Na šoli danes ni načrtovanih dogodkov.</small>
        @endif

        <div class="footer">
            <div class="footer-content">
                <div class="footer-text">
                    <p>
                        <strong>eKakovost</strong> – Pot do odličnosti | 
                        <span class="icon">🌍</span> 
                        <a href="{{ env('APP_URL', 'https://www.ekakovost.com') }}" class="link">
                            {{ env('APP_URL', 'www.ekakovost.com') }}
                        </a>
                    </p>
                    <p class="small-text">To sporočilo je bilo avtomatsko ustvarjeno in nanj ne morete odgovoriti.  
                        Za vprašanja se obrnite na naš kontakt.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
