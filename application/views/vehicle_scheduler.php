<!DOCTYPE html>
<html>
<head>
    <title>Semantic UI Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        .calendar_container {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            width: 100%;
            /*overflow: auto;*/
        }
        
        .calendar_cell.today .header {
            color: orange !important;
            font-weight: bold !important;
            font-size: 1.3rem !important;
        }

        .ui.card.today {
            box-shadow: 2px 2px 2px rgba(190, 90, 0, 0.4);
        }

        .calendar_header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .calendar_cell {
            border-radius: 6px;
            padding: 0.5rem;
            height: 100%;
            min-width: 0;
            width: 100%;
        }

        .ui.card {
            width: 100% !important;
            margin: 0 !important;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.1);
            padding: 0;
        }

        .day_activator {
            width: 100%;
            overflow-wrap: break-word;
        }

        .calendar_cell .header {
            font-weight: bold;
            font-size: 1rem;
        }

        .navigation_wrapper {
            text-align: center;
            margin: 1rem 0 1.5rem;
        }

        #month_label {
            text-align: center;
            margin-top: 1.5rem;
            margin-bottom: 0.25rem;
        }

        #trip_booking_form {
            width: 640px;
            max-width: 100%;
            margin: 0 auto;
        }

        #trip_booking_form .two.fields {
            display: flex !important;
            flex-wrap: nowrap !important;
            gap: 0.2rem;
        }

        #trip_booking_form .field {
            flex: 1 1 0 !important;
            min-width: 0; /* Prevents growing beyond container */
        }

        #trip_booking_form .ui.input,
        #trip_booking_form .ui.action.input {
            width: 100% !important;
            overflow: hidden;
        }

        .ui.dropdown .menu .visible{
            min-height: 50vh !important;
            height: 50vh !important;
            max-height: 60vh !important;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch; /* enables momentum scroll on iOS */
            touch-action: pan-y;
        }
        .ui.dropdown .long{
            min-height: 30vh !important;
            height: 30vh !important;
            max-height: 50vh !important;
        }

        .tiny_text {
            font-size: 0.5rem;
            letter-spacing: -0.05rem;
        }

    </style>
</head>
<body>
    <div class="ui container">
        <h1 class="ui header" id="month_label">Month</h1>

        <div class="navigation_wrapper">
            <button class="ui labeled icon button" id="prev_month">
                <i class="left arrow icon"></i> Previous
            </button>
            <button class="ui right labeled icon button" id="next_month">
                Next <i class="right arrow icon"></i>
            </button>
        </div>

        <div class="calendar_header">
            <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
        </div>

        <div class="calendar_container" id="calendar"></div>

        <div class="ui small modal" id="day_schedule_modal">
            <div class="ui header center aligned">
                <a class="break-text" id="date_header"></a>
            </div>
            <div class="ui very padded basic segment content">
                    <div class="ui middle aligned celled relaxed list selection" id="schedules_container">
                        
                    </div>
            </div>
            <div class="actions modal-actions">
                <div class="ui orange right corner small label" id="image_preview_closer">
                    <i class="ui times pointered big deny icon"></i>
                </div>
                <div class="ui tiny teal button trip_booking_activator">
                    <i class="car icon"></i>
                    Book a Trip
                </div>
            </div>
        </div>

        <div class="ui tiny modal" id="trip_booking_modal">
            <div class="ui header medium center aligned">
                <a class="break-text">Book a Trip</a>       
            </div>
            <div class="content">
                <h3 id="trip_date_header" align="center">
                </h3>
                <form class="ui form" enctype="multipart/form-data" id="trip_booking_form">
                    <div class="field required">
                        <label>Requestor</label>
                        <div class="ui icon selection dropdown button basic small" id="users_drop">
                            <span class="transition" id="requestor_icon"><i class="user icon"></i>&nbsp;&nbsp;</span>
                            <input type="hidden" name="requestor_id" id="requestor_id" value="">
                            <div class="default text">Requestor</div>
                            <div class="menu" id="users_drop_menu">
                                
                            </div>
                        </div>
                    </div>
                    <div class="field required">
                        <label>Passengers</label>
                        <div class="ui icon multiple selection dropdown button basic small" id="passengers_drop">
                            <span class="transition" id="passengers_icon">&nbsp;&nbsp;<i class="users icon"></i></span>
                            <input type="hidden" name="passengers_id" id="passengers_id" value="">
                            <div class="default text">Passengers</div>
                            <div class="menu" id="passengers_drop_menu">
                                
                            </div>
                        </div>
                    </div>
                    <div class="field required">
                        <label>Purpose</label>
                        <div class="ui left icon input small">
                            <i class="bullseye icon" id="purpose_icon"></i>
                            <input data-icon="purpose_icon" class="validate_input" type="text" name="purpose" id="purpose" value="">
                        </div>
                    </div>
                    <div class="field required">
                        <label>Choose a Vehicle</label>
                        <div class="ui icon selection dropdown button basic small" id="car_dropdown">
                            <i class="car icon" id="car_icon"></i>&nbsp;&nbsp;
                            <input type="hidden" name="car_selection" id="car_selection">
                            <div class="default text">Select Vehicle</div>
                            <div class="menu">
                                <div class="item" data-value="mitsubishi_adventure" data-color="red">
                                    <div class="ui red empty circular label car_label"></div>
                                    Mitsubishi Adventure
                                </div>
                                <div class="item" data-value="isuzu_dmax" id="" data-color="blue">
                                    <div class="ui blue empty circular label car_label"></div>
                                    Isuzu D-Max
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="trip_date" id="trip_date">
                    </div>
                    
                    <div class="two fields">
                        <div class="field required">
                            <label>Origin</label>
                            <div class="ui icon selection long dropdown button basic small" id="origin_drop">
                                <input class="validate_input" data-icon="origin_icon" type="hidden" name="origin" id="origin">
                                <i class="flag icon" id="origin_icon"></i>&nbsp;&nbsp;
                                <div class="text">Select Origin</div>
                                <div class="menu">
                                    <div class="ui icon search input">
                                        <i class="search icon"></i>
                                        <input type="text" name="origin_drop">
                                    </div>
                                    <div class="item" data-value="Official Station">Official Station</div>
                                    <div class="item" data-value="Catbalogan City, Samar">Catbalogan City, Samar</div>
                                    <div class="item" data-value="Almeria, Biliran">Almeria, Biliran</div>
                                    <div class="item" data-value="Biliran, Biliran">Biliran, Biliran</div>
                                    <div class="item" data-value="Cabucgayan, Biliran">Cabucgayan, Biliran</div>
                                    <div class="item" data-value="Caibiran, Biliran">Caibiran, Biliran</div>
                                    <div class="item" data-value="Culaba, Biliran">Culaba, Biliran</div>
                                    <div class="item" data-value="Kawayan, Biliran">Kawayan, Biliran</div>
                                    <div class="item" data-value="Maripipi, Biliran">Maripipi, Biliran</div>
                                    <div class="item" data-value="Naval, Biliran">Naval, Biliran</div>
                                    <div class="item" data-value="Arteche, Eastern Samar">Arteche, Eastern Samar</div>
                                    <div class="item" data-value="Balangiga, Eastern Samar">Balangiga, Eastern Samar</div>
                                    <div class="item" data-value="Balangkayan, Eastern Samar">Balangkayan, Eastern Samar</div>
                                    <div class="item" data-value="Can-avid, Eastern Samar">Can-avid, Eastern Samar</div>
                                    <div class="item" data-value="Dolores, Eastern Samar">Dolores, Eastern Samar</div>
                                    <div class="item" data-value="General MacArthur, Eastern Samar">General MacArthur, Eastern Samar</div>
                                    <div class="item" data-value="Giporlos, Eastern Samar">Giporlos, Eastern Samar</div>
                                    <div class="item" data-value="Guiuan, Eastern Samar">Guiuan, Eastern Samar</div>
                                    <div class="item" data-value="Hernani, Eastern Samar">Hernani, Eastern Samar</div>
                                    <div class="item" data-value="Jipapad, Eastern Samar">Jipapad, Eastern Samar</div>
                                    <div class="item" data-value="Lawaan, Eastern Samar">Lawaan, Eastern Samar</div>
                                    <div class="item" data-value="Llorente, Eastern Samar">Llorente, Eastern Samar</div>
                                    <div class="item" data-value="Maslog, Eastern Samar">Maslog, Eastern Samar</div>
                                    <div class="item" data-value="Maydolong, Eastern Samar">Maydolong, Eastern Samar</div>
                                    <div class="item" data-value="Mercedes, Eastern Samar">Mercedes, Eastern Samar</div>
                                    <div class="item" data-value="Oras, Eastern Samar">Oras, Eastern Samar</div>
                                    <div class="item" data-value="Quinapondan, Eastern Samar">Quinapondan, Eastern Samar</div>
                                    <div class="item" data-value="Salcedo, Eastern Samar">Salcedo, Eastern Samar</div>
                                    <div class="item" data-value="San Julian, Eastern Samar">San Julian, Eastern Samar</div>
                                    <div class="item" data-value="San Policarpo, Eastern Samar">San Policarpo, Eastern Samar</div>
                                    <div class="item" data-value="Sulat, Eastern Samar">Sulat, Eastern Samar</div>
                                    <div class="item" data-value="Taft, Eastern Samar">Taft, Eastern Samar</div>
                                    <div class="item" data-value="Abuyog, Leyte">Abuyog, Leyte</div>
                                    <div class="item" data-value="Alangalang, Leyte">Alangalang, Leyte</div>
                                    <div class="item" data-value="Albuera, Leyte">Albuera, Leyte</div>
                                    <div class="item" data-value="Babatngon, Leyte">Babatngon, Leyte</div>
                                    <div class="item" data-value="Barugo, Leyte">Barugo, Leyte</div>
                                    <div class="item" data-value="Bato, Leyte">Bato, Leyte</div>
                                    <div class="item" data-value="Baybay City, Leyte">Baybay City, Leyte</div>
                                    <div class="item" data-value="Burauen, Leyte">Burauen, Leyte</div>
                                    <div class="item" data-value="Calubian, Leyte">Calubian, Leyte</div>
                                    <div class="item" data-value="Capoocan, Leyte">Capoocan, Leyte</div>
                                    <div class="item" data-value="Carigara, Leyte">Carigara, Leyte</div>
                                    <div class="item" data-value="Dagami, Leyte">Dagami, Leyte</div>
                                    <div class="item" data-value="Dulag, Leyte">Dulag, Leyte</div>
                                    <div class="item" data-value="Hilongos, Leyte">Hilongos, Leyte</div>
                                    <div class="item" data-value="Hindang, Leyte">Hindang, Leyte</div>
                                    <div class="item" data-value="Inopacan, Leyte">Inopacan, Leyte</div>
                                    <div class="item" data-value="Isabel, Leyte">Isabel, Leyte</div>
                                    <div class="item" data-value="Jaro, Leyte">Jaro, Leyte</div>
                                    <div class="item" data-value="Javier, Leyte">Javier, Leyte</div>
                                    <div class="item" data-value="Julita, Leyte">Julita, Leyte</div>
                                    <div class="item" data-value="Kananga, Leyte">Kananga, Leyte</div>
                                    <div class="item" data-value="La Paz, Leyte">La Paz, Leyte</div>
                                    <div class="item" data-value="Leyte, Leyte">Leyte, Leyte</div>
                                    <div class="item" data-value="MacArthur, Leyte">MacArthur, Leyte</div>
                                    <div class="item" data-value="Mahaplag, Leyte">Mahaplag, Leyte</div>
                                    <div class="item" data-value="Matag-ob, Leyte">Matag-ob, Leyte</div>
                                    <div class="item" data-value="Matalom, Leyte">Matalom, Leyte</div>
                                    <div class="item" data-value="Mayorga, Leyte">Mayorga, Leyte</div>
                                    <div class="item" data-value="Merida, Leyte">Merida, Leyte</div>
                                    <div class="item" data-value="Ormoc City, Leyte">Ormoc City, Leyte</div>
                                    <div class="item" data-value="Palo, Leyte">Palo, Leyte</div>
                                    <div class="item" data-value="Palompon, Leyte">Palompon, Leyte</div>
                                    <div class="item" data-value="Pastrana, Leyte">Pastrana, Leyte</div>
                                    <div class="item" data-value="San Isidro, Leyte">San Isidro, Leyte</div>
                                    <div class="item" data-value="San Miguel, Leyte">San Miguel, Leyte</div>
                                    <div class="item" data-value="Santa Fe, Leyte">Santa Fe, Leyte</div>
                                    <div class="item" data-value="Tabango, Leyte">Tabango, Leyte</div>
                                    <div class="item" data-value="Tabontabon, Leyte">Tabontabon, Leyte</div>
                                    <div class="item" data-value="Tacloban City, Leyte">Tacloban City, Leyte</div>
                                    <div class="item" data-value="Tanauan, Leyte">Tanauan, Leyte</div>
                                    <div class="item" data-value="Tolosa, Leyte">Tolosa, Leyte</div>
                                    <div class="item" data-value="Tunga, Leyte">Tunga, Leyte</div>
                                    <div class="item" data-value="Villaba, Leyte">Villaba, Leyte</div>
                                    <div class="item" data-value="Allen, Northern Samar">Allen, Northern Samar</div>
                                    <div class="item" data-value="Biri, Northern Samar">Biri, Northern Samar</div>
                                    <div class="item" data-value="Bobon, Northern Samar">Bobon, Northern Samar</div>
                                    <div class="item" data-value="Capul, Northern Samar">Capul, Northern Samar</div>
                                    <div class="item" data-value="Catarman, Northern Samar">Catarman, Northern Samar</div>
                                    <div class="item" data-value="Catubig, Northern Samar">Catubig, Northern Samar</div>
                                    <div class="item" data-value="Gamay, Northern Samar">Gamay, Northern Samar</div>
                                    <div class="item" data-value="Laoang, Northern Samar">Laoang, Northern Samar</div>
                                    <div class="item" data-value="Lapinig, Northern Samar">Lapinig, Northern Samar</div>
                                    <div class="item" data-value="Las Navas, Northern Samar">Las Navas, Northern Samar</div>
                                    <div class="item" data-value="Lavezares, Northern Samar">Lavezares, Northern Samar</div>
                                    <div class="item" data-value="Mapanas, Northern Samar">Mapanas, Northern Samar</div>
                                    <div class="item" data-value="Mondragon, Northern Samar">Mondragon, Northern Samar</div>
                                    <div class="item" data-value="Palapag, Northern Samar">Palapag, Northern Samar</div>
                                    <div class="item" data-value="Pambujan, Northern Samar">Pambujan, Northern Samar</div>
                                    <div class="item" data-value="Rosario, Northern Samar">Rosario, Northern Samar</div>
                                    <div class="item" data-value="San Antonio, Northern Samar">San Antonio, Northern Samar</div>
                                    <div class="item" data-value="San Isidro, Northern Samar">San Isidro, Northern Samar</div>
                                    <div class="item" data-value="San Jose, Northern Samar">San Jose, Northern Samar</div>
                                    <div class="item" data-value="San Roque, Northern Samar">San Roque, Northern Samar</div>
                                    <div class="item" data-value="San Vicente, Northern Samar">San Vicente, Northern Samar</div>
                                    <div class="item" data-value="Silvino Lobos, Northern Samar">Silvino Lobos, Northern Samar</div>
                                    <div class="item" data-value="Victoria, Northern Samar">Victoria, Northern Samar</div>
                                    <div class="item" data-value="Almagro, Samar">Almagro, Samar</div>
                                    <div class="item" data-value="Basey, Samar">Basey, Samar</div>
                                    <div class="item" data-value="Calbayog City, Samar">Calbayog City, Samar</div>
                                    <div class="item" data-value="Calbiga, Samar">Calbiga, Samar</div>
                                    <div class="item" data-value="Daram, Samar">Daram, Samar</div>
                                    <div class="item" data-value="Gandara, Samar">Gandara, Samar</div>
                                    <div class="item" data-value="Hinabangan, Samar">Hinabangan, Samar</div>
                                    <div class="item" data-value="Jiabong, Samar">Jiabong, Samar</div>
                                    <div class="item" data-value="Marabut, Samar">Marabut, Samar</div>
                                    <div class="item" data-value="Matuguinao, Samar">Matuguinao, Samar</div>
                                    <div class="item" data-value="Motiong, Samar">Motiong, Samar</div>
                                    <div class="item" data-value="Pagsanghan, Samar">Pagsanghan, Samar</div>
                                    <div class="item" data-value="Paranas, Samar">Paranas, Samar</div>
                                    <div class="item" data-value="Pinabacdao, Samar">Pinabacdao, Samar</div>
                                    <div class="item" data-value="San Jorge, Samar">San Jorge, Samar</div>
                                    <div class="item" data-value="San Jose de Buan, Samar">San Jose de Buan, Samar</div>
                                    <div class="item" data-value="San Sebastian, Samar">San Sebastian, Samar</div>
                                    <div class="item" data-value="Santa Margarita, Samar">Santa Margarita, Samar</div>
                                    <div class="item" data-value="Santa Rita, Samar">Santa Rita, Samar</div>
                                    <div class="item" data-value="Talalora, Samar">Talalora, Samar</div>
                                    <div class="item" data-value="Tarangnan, Samar">Tarangnan, Samar</div>
                                    <div class="item" data-value="Villareal, Samar">Villareal, Samar</div>
                                    <div class="item" data-value="Zumarraga, Samar">Zumarraga, Samar</div>
                                    <div class="item" data-value="Anahawan, Southern Leyte">Anahawan, Southern Leyte</div>
                                    <div class="item" data-value="Bontoc, Southern Leyte">Bontoc, Southern Leyte</div>
                                    <div class="item" data-value="Hinunangan, Southern Leyte">Hinunangan, Southern Leyte</div>
                                    <div class="item" data-value="Hinundayan, Southern Leyte">Hinundayan, Southern Leyte</div>
                                    <div class="item" data-value="Libagon, Southern Leyte">Libagon, Southern Leyte</div>
                                    <div class="item" data-value="Liloan, Southern Leyte">Liloan, Southern Leyte</div>
                                    <div class="item" data-value="Limasawa, Southern Leyte">Limasawa, Southern Leyte</div>
                                    <div class="item" data-value="Macrohon, Southern Leyte">Macrohon, Southern Leyte</div>
                                    <div class="item" data-value="Malitbog, Southern Leyte">Malitbog, Southern Leyte</div>
                                    <div class="item" data-value="Padre Burgos, Southern Leyte">Padre Burgos, Southern Leyte</div>
                                    <div class="item" data-value="Pintuyan, Southern Leyte">Pintuyan, Southern Leyte</div>
                                    <div class="item" data-value="Saint Bernard, Southern Leyte">Saint Bernard, Southern Leyte</div>
                                    <div class="item" data-value="San Francisco, Southern Leyte">San Francisco, Southern Leyte</div>
                                    <div class="item" data-value="San Juan, Southern Leyte">San Juan, Southern Leyte</div>
                                    <div class="item" data-value="San Ricardo, Southern Leyte">San Ricardo, Southern Leyte</div>
                                    <div class="item" data-value="Silago, Southern Leyte">Silago, Southern Leyte</div>
                                    <div class="item" data-value="Sogod, Southern Leyte">Sogod, Southern Leyte</div>
                                    <div class="item" data-value="Tomas Oppus, Southern Leyte">Tomas Oppus, Southern Leyte</div>
                                    <div class="item" data-value="Maasin City, Southern Leyte">Maasin City, Southern Leyte</div>
                                </div>
                            </div>
                        </div>

                        <div class="field required">
                            <label>Destination</label>
                            <div class="ui icon selection long dropdown button basic small" id="destination_drop">
                                <input class="validate_input" data-icon="destination_icon" type="hidden" class="required" name="destination" id="destination">
                                <i class="map marker alternate icon" id="destination_icon"></i>&nbsp;&nbsp;
                                <span class="text">Select Destination</span>
                                <div class="menu">
                                    <div class="ui icon search input">
                                        <i class="search icon"></i>
                                        <input type="text">
                                    </div>
                                    <div class="item" data-value="Official Station">Official Station</div>
                                    <div class="item" data-value="Catbalogan City, Samar">Catbalogan City, Samar</div>
                                    <div class="item" data-value="Almeria, Biliran">Almeria, Biliran</div>
                                    <div class="item" data-value="Biliran, Biliran">Biliran, Biliran</div>
                                    <div class="item" data-value="Cabucgayan, Biliran">Cabucgayan, Biliran</div>
                                    <div class="item" data-value="Caibiran, Biliran">Caibiran, Biliran</div>
                                    <div class="item" data-value="Culaba, Biliran">Culaba, Biliran</div>
                                    <div class="item" data-value="Kawayan, Biliran">Kawayan, Biliran</div>
                                    <div class="item" data-value="Maripipi, Biliran">Maripipi, Biliran</div>
                                    <div class="item" data-value="Naval, Biliran">Naval, Biliran</div>
                                    <div class="item" data-value="Arteche, Eastern Samar">Arteche, Eastern Samar</div>
                                    <div class="item" data-value="Balangiga, Eastern Samar">Balangiga, Eastern Samar</div>
                                    <div class="item" data-value="Balangkayan, Eastern Samar">Balangkayan, Eastern Samar</div>
                                    <div class="item" data-value="Can-avid, Eastern Samar">Can-avid, Eastern Samar</div>
                                    <div class="item" data-value="Dolores, Eastern Samar">Dolores, Eastern Samar</div>
                                    <div class="item" data-value="General MacArthur, Eastern Samar">General MacArthur, Eastern Samar</div>
                                    <div class="item" data-value="Giporlos, Eastern Samar">Giporlos, Eastern Samar</div>
                                    <div class="item" data-value="Guiuan, Eastern Samar">Guiuan, Eastern Samar</div>
                                    <div class="item" data-value="Hernani, Eastern Samar">Hernani, Eastern Samar</div>
                                    <div class="item" data-value="Jipapad, Eastern Samar">Jipapad, Eastern Samar</div>
                                    <div class="item" data-value="Lawaan, Eastern Samar">Lawaan, Eastern Samar</div>
                                    <div class="item" data-value="Llorente, Eastern Samar">Llorente, Eastern Samar</div>
                                    <div class="item" data-value="Maslog, Eastern Samar">Maslog, Eastern Samar</div>
                                    <div class="item" data-value="Maydolong, Eastern Samar">Maydolong, Eastern Samar</div>
                                    <div class="item" data-value="Mercedes, Eastern Samar">Mercedes, Eastern Samar</div>
                                    <div class="item" data-value="Oras, Eastern Samar">Oras, Eastern Samar</div>
                                    <div class="item" data-value="Quinapondan, Eastern Samar">Quinapondan, Eastern Samar</div>
                                    <div class="item" data-value="Salcedo, Eastern Samar">Salcedo, Eastern Samar</div>
                                    <div class="item" data-value="San Julian, Eastern Samar">San Julian, Eastern Samar</div>
                                    <div class="item" data-value="San Policarpo, Eastern Samar">San Policarpo, Eastern Samar</div>
                                    <div class="item" data-value="Sulat, Eastern Samar">Sulat, Eastern Samar</div>
                                    <div class="item" data-value="Taft, Eastern Samar">Taft, Eastern Samar</div>
                                    <div class="item" data-value="Abuyog, Leyte">Abuyog, Leyte</div>
                                    <div class="item" data-value="Alangalang, Leyte">Alangalang, Leyte</div>
                                    <div class="item" data-value="Albuera, Leyte">Albuera, Leyte</div>
                                    <div class="item" data-value="Babatngon, Leyte">Babatngon, Leyte</div>
                                    <div class="item" data-value="Barugo, Leyte">Barugo, Leyte</div>
                                    <div class="item" data-value="Bato, Leyte">Bato, Leyte</div>
                                    <div class="item" data-value="Baybay City, Leyte">Baybay City, Leyte</div>
                                    <div class="item" data-value="Burauen, Leyte">Burauen, Leyte</div>
                                    <div class="item" data-value="Calubian, Leyte">Calubian, Leyte</div>
                                    <div class="item" data-value="Capoocan, Leyte">Capoocan, Leyte</div>
                                    <div class="item" data-value="Carigara, Leyte">Carigara, Leyte</div>
                                    <div class="item" data-value="Dagami, Leyte">Dagami, Leyte</div>
                                    <div class="item" data-value="Dulag, Leyte">Dulag, Leyte</div>
                                    <div class="item" data-value="Hilongos, Leyte">Hilongos, Leyte</div>
                                    <div class="item" data-value="Hindang, Leyte">Hindang, Leyte</div>
                                    <div class="item" data-value="Inopacan, Leyte">Inopacan, Leyte</div>
                                    <div class="item" data-value="Isabel, Leyte">Isabel, Leyte</div>
                                    <div class="item" data-value="Jaro, Leyte">Jaro, Leyte</div>
                                    <div class="item" data-value="Javier, Leyte">Javier, Leyte</div>
                                    <div class="item" data-value="Julita, Leyte">Julita, Leyte</div>
                                    <div class="item" data-value="Kananga, Leyte">Kananga, Leyte</div>
                                    <div class="item" data-value="La Paz, Leyte">La Paz, Leyte</div>
                                    <div class="item" data-value="Leyte, Leyte">Leyte, Leyte</div>
                                    <div class="item" data-value="MacArthur, Leyte">MacArthur, Leyte</div>
                                    <div class="item" data-value="Mahaplag, Leyte">Mahaplag, Leyte</div>
                                    <div class="item" data-value="Matag-ob, Leyte">Matag-ob, Leyte</div>
                                    <div class="item" data-value="Matalom, Leyte">Matalom, Leyte</div>
                                    <div class="item" data-value="Mayorga, Leyte">Mayorga, Leyte</div>
                                    <div class="item" data-value="Merida, Leyte">Merida, Leyte</div>
                                    <div class="item" data-value="Ormoc City, Leyte">Ormoc City, Leyte</div>
                                    <div class="item" data-value="Palo, Leyte">Palo, Leyte</div>
                                    <div class="item" data-value="Palompon, Leyte">Palompon, Leyte</div>
                                    <div class="item" data-value="Pastrana, Leyte">Pastrana, Leyte</div>
                                    <div class="item" data-value="San Isidro, Leyte">San Isidro, Leyte</div>
                                    <div class="item" data-value="San Miguel, Leyte">San Miguel, Leyte</div>
                                    <div class="item" data-value="Santa Fe, Leyte">Santa Fe, Leyte</div>
                                    <div class="item" data-value="Tabango, Leyte">Tabango, Leyte</div>
                                    <div class="item" data-value="Tabontabon, Leyte">Tabontabon, Leyte</div>
                                    <div class="item" data-value="Tacloban City, Leyte">Tacloban City, Leyte</div>
                                    <div class="item" data-value="Tanauan, Leyte">Tanauan, Leyte</div>
                                    <div class="item" data-value="Tolosa, Leyte">Tolosa, Leyte</div>
                                    <div class="item" data-value="Tunga, Leyte">Tunga, Leyte</div>
                                    <div class="item" data-value="Villaba, Leyte">Villaba, Leyte</div>
                                    <div class="item" data-value="Allen, Northern Samar">Allen, Northern Samar</div>
                                    <div class="item" data-value="Biri, Northern Samar">Biri, Northern Samar</div>
                                    <div class="item" data-value="Bobon, Northern Samar">Bobon, Northern Samar</div>
                                    <div class="item" data-value="Capul, Northern Samar">Capul, Northern Samar</div>
                                    <div class="item" data-value="Catarman, Northern Samar">Catarman, Northern Samar</div>
                                    <div class="item" data-value="Catubig, Northern Samar">Catubig, Northern Samar</div>
                                    <div class="item" data-value="Gamay, Northern Samar">Gamay, Northern Samar</div>
                                    <div class="item" data-value="Laoang, Northern Samar">Laoang, Northern Samar</div>
                                    <div class="item" data-value="Lapinig, Northern Samar">Lapinig, Northern Samar</div>
                                    <div class="item" data-value="Las Navas, Northern Samar">Las Navas, Northern Samar</div>
                                    <div class="item" data-value="Lavezares, Northern Samar">Lavezares, Northern Samar</div>
                                    <div class="item" data-value="Mapanas, Northern Samar">Mapanas, Northern Samar</div>
                                    <div class="item" data-value="Mondragon, Northern Samar">Mondragon, Northern Samar</div>
                                    <div class="item" data-value="Palapag, Northern Samar">Palapag, Northern Samar</div>
                                    <div class="item" data-value="Pambujan, Northern Samar">Pambujan, Northern Samar</div>
                                    <div class="item" data-value="Rosario, Northern Samar">Rosario, Northern Samar</div>
                                    <div class="item" data-value="San Antonio, Northern Samar">San Antonio, Northern Samar</div>
                                    <div class="item" data-value="San Isidro, Northern Samar">San Isidro, Northern Samar</div>
                                    <div class="item" data-value="San Jose, Northern Samar">San Jose, Northern Samar</div>
                                    <div class="item" data-value="San Roque, Northern Samar">San Roque, Northern Samar</div>
                                    <div class="item" data-value="San Vicente, Northern Samar">San Vicente, Northern Samar</div>
                                    <div class="item" data-value="Silvino Lobos, Northern Samar">Silvino Lobos, Northern Samar</div>
                                    <div class="item" data-value="Victoria, Northern Samar">Victoria, Northern Samar</div>
                                    <div class="item" data-value="Almagro, Samar">Almagro, Samar</div>
                                    <div class="item" data-value="Basey, Samar">Basey, Samar</div>
                                    <div class="item" data-value="Calbayog City, Samar">Calbayog City, Samar</div>
                                    <div class="item" data-value="Calbiga, Samar">Calbiga, Samar</div>
                                    <div class="item" data-value="Daram, Samar">Daram, Samar</div>
                                    <div class="item" data-value="Gandara, Samar">Gandara, Samar</div>
                                    <div class="item" data-value="Hinabangan, Samar">Hinabangan, Samar</div>
                                    <div class="item" data-value="Jiabong, Samar">Jiabong, Samar</div>
                                    <div class="item" data-value="Marabut, Samar">Marabut, Samar</div>
                                    <div class="item" data-value="Matuguinao, Samar">Matuguinao, Samar</div>
                                    <div class="item" data-value="Motiong, Samar">Motiong, Samar</div>
                                    <div class="item" data-value="Pagsanghan, Samar">Pagsanghan, Samar</div>
                                    <div class="item" data-value="Paranas, Samar">Paranas, Samar</div>
                                    <div class="item" data-value="Pinabacdao, Samar">Pinabacdao, Samar</div>
                                    <div class="item" data-value="San Jorge, Samar">San Jorge, Samar</div>
                                    <div class="item" data-value="San Jose de Buan, Samar">San Jose de Buan, Samar</div>
                                    <div class="item" data-value="San Sebastian, Samar">San Sebastian, Samar</div>
                                    <div class="item" data-value="Santa Margarita, Samar">Santa Margarita, Samar</div>
                                    <div class="item" data-value="Santa Rita, Samar">Santa Rita, Samar</div>
                                    <div class="item" data-value="Talalora, Samar">Talalora, Samar</div>
                                    <div class="item" data-value="Tarangnan, Samar">Tarangnan, Samar</div>
                                    <div class="item" data-value="Villareal, Samar">Villareal, Samar</div>
                                    <div class="item" data-value="Zumarraga, Samar">Zumarraga, Samar</div>
                                    <div class="item" data-value="Anahawan, Southern Leyte">Anahawan, Southern Leyte</div>
                                    <div class="item" data-value="Bontoc, Southern Leyte">Bontoc, Southern Leyte</div>
                                    <div class="item" data-value="Hinunangan, Southern Leyte">Hinunangan, Southern Leyte</div>
                                    <div class="item" data-value="Hinundayan, Southern Leyte">Hinundayan, Southern Leyte</div>
                                    <div class="item" data-value="Libagon, Southern Leyte">Libagon, Southern Leyte</div>
                                    <div class="item" data-value="Liloan, Southern Leyte">Liloan, Southern Leyte</div>
                                    <div class="item" data-value="Limasawa, Southern Leyte">Limasawa, Southern Leyte</div>
                                    <div class="item" data-value="Macrohon, Southern Leyte">Macrohon, Southern Leyte</div>
                                    <div class="item" data-value="Malitbog, Southern Leyte">Malitbog, Southern Leyte</div>
                                    <div class="item" data-value="Padre Burgos, Southern Leyte">Padre Burgos, Southern Leyte</div>
                                    <div class="item" data-value="Pintuyan, Southern Leyte">Pintuyan, Southern Leyte</div>
                                    <div class="item" data-value="Saint Bernard, Southern Leyte">Saint Bernard, Southern Leyte</div>
                                    <div class="item" data-value="San Francisco, Southern Leyte">San Francisco, Southern Leyte</div>
                                    <div class="item" data-value="San Juan, Southern Leyte">San Juan, Southern Leyte</div>
                                    <div class="item" data-value="San Ricardo, Southern Leyte">San Ricardo, Southern Leyte</div>
                                    <div class="item" data-value="Silago, Southern Leyte">Silago, Southern Leyte</div>
                                    <div class="item" data-value="Sogod, Southern Leyte">Sogod, Southern Leyte</div>
                                    <div class="item" data-value="Tomas Oppus, Southern Leyte">Tomas Oppus, Southern Leyte</div>
                                    <div class="item" data-value="Maasin City, Southern Leyte">Maasin City, Southern Leyte</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <input type="hidden" name="vice_versa_check" value="false">
                        <div class="ui checkbox">
                            <input type="checkbox" index="0" name="vice_versa_check" id="vice_versa_check" value="true">
                            <label>Vice Versa</label>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field required">
                            <label>Trip Start</label>
                            <div class="ui icon selection long dropdown button basic small" id="booking_start_dropdown">
                                <i class="hourglass start icon" id="trip_start_icon"></i>&nbsp;&nbsp;
                                <input class="validate_input" data-icon="trip_start_icon" type="hidden" name="booking_start_time" id="booking_start_time">
                                <div class="default text">Start Time</div>
                                <div class="menu" id="start_time_menu"></div>
                            </div>
                        </div>
                        <div class="field required">
                            <label>Trip End</label>
                            <div class="ui icon selection long dropdown button basic small" id="booking_end_dropdown">
                                <i class="hourglass end icon" id="trip_end_icon"></i>&nbsp;&nbsp;
                                <input class="validate_input" data-icon="trip_end_icon" type="hidden" name="booking_end_time" id="booking_end_time">
                                <div class="text">Select End Time</div>
                                <div class="menu" id="end_time_menu"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="actions modal-actions">
                <button type="submit" form="trip_booking_form" class="ui mini teal button">
                    <i class="calendar check outline icon"></i>
                    Confirm Booking
                </button>
                <div class="ui mini orange button day_schedule_activator">
                    <i class="x icon"></i>
                    Cancel
                </div>
            </div>
        </div>
    </div>
    <div class="ui tiny modal" id="schedule_confirmation_modal">
        <div class="ui header center aligned">
            <a class="break-text" id="schedule_confirmation_header"></a>
        </div>
        <div class="ui very padded basic segment content">
                <div class="ui middle aligned celled relaxed list selection" id="schedule_confirmation_container">
                    
                </div>
        </div>
        <div class="actions modal-actions">
            <div class="ui orange right corner small label">
                <i class="ui times pointered big deny icon"></i>
            </div>
        </div>
    </div>

    <script>
        $('.ui.modal').on('touchstart touchmove', '.menu.visible', function(e) {
            e.stopPropagation();
        });

        loading_start('Loading Calendar');
        const month_names = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const today_date = new Date();
        const base_month = today_date.getMonth();
        const base_year = today_date.getFullYear();

        let current_month = base_month;
        let current_year = base_year;

        function render_calendar(month, year) {
            $('#calendar').empty();
            $('#month_label').text(`${month_names[month]} ${year}`);

            const first_day = new Date(year, month, 1).getDay();
            const days_in_month = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < first_day; i++) {
                $('#calendar').append('<div></div>');
            }

            for (let day = 1; day <= days_in_month; day++) {
                const is_today =
                    day === today_date.getDate() &&
                    month === today_date.getMonth() &&
                    year === today_date.getFullYear();

                const today_class = is_today ? 'today orange' : '';

                const cell_html = `
                    <a class="ui card ${today_class} calendar_cell" data-day_value="${day}" data-month_value="${month}" data-year_value="${year}">
                        <div class="content day_activator">
                            <div class="ui tiny header">${day}</div>
                            <div class="meta">
                                
                            </div>
                            <div class="description"><p>
                                <div class="ui middle aligned list">
                                    <div class="item">
                                        <div class="right floated content">
                                            <div class="right aligned">
                                                <i class="red car icon"></i>
                                                
                                            </div>
                                            <div class="right aligned">
                                                <i class="blue car icon"></i>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </p></div>
                        </div>
                    </a>
                `;
                $('#calendar').append(cell_html);
            }
            loading_stop();

            const next_view_date = new Date(year, month);
            const forward_limit = new Date(base_year, base_month + 1);
            const next_disabled = next_view_date >= forward_limit;

            $('#prev_month').prop('disabled', false);
            $('#next_month').prop('disabled', next_disabled);
        }

        render_calendar(current_month, current_year);

        $('#calendar').on('click', '.calendar_cell', function (event) {
            event.preventDefault();
            var day_value = $(this).data('day_value');
            var month_value = $(this).data('month_value');
            var year_value = $(this).data('year_value');

            const current_date = new Date(base_year, base_month);
            const clicked_date = new Date(year_value, month_value);
            const next_month_date = new Date(base_year, base_month + 1);

            const is_current_month = clicked_date.getFullYear() === current_date.getFullYear() && clicked_date.getMonth() === current_date.getMonth();
            const is_next_month = clicked_date.getFullYear() === next_month_date.getFullYear() && clicked_date.getMonth() === next_month_date.getMonth();

            if (!is_current_month && !is_next_month) {
                return;
            }

            var formatted = `${month_names[month_value]} ${day_value}, ${year_value}`;
            $('#date_header').html(formatted);
            $('#trip_date').val(formatted);
            $('#trip_date_header').html(formatted);
            load_calendar_schedules(formatted);

            $('#day_schedule_modal')
                .modal({
                    useFlex: true,
                    allowMultiple: false,
                    autofocus: false,
                    blurring: true,
                    closable: true
                })
                .modal('show')
            ;
        });

        $('.trip_booking_activator').on('click', function (event) {
            reset_trip_form();

            $('#trip_booking_modal')
                .modal({
                    useFlex: true,
                    allowMultiple: false,
                    autofocus: false,
                    blurring: true,
                    closable: true
                })
                .modal('show')
            ;
        });

        $('.day_schedule_activator').on('click', function() {
            $('#day_schedule_modal')
                .modal('show')
            ;
        });

        $('#day_schedule_modal')
            .modal({
                onHidden: function () {
                    console.log('Modal was closed');
                }
            })
        ;

        function reset_trip_form() {
            const $form = $('#trip_booking_form');

            $form[0].reset();
            $form.form('clear');

            $form.removeClass('error success');
            $form.find('.field').removeClass('error');
            $form.find('.prompt, .ui.pointing.label').remove();

            $form.find('.ui.dropdown').each(function () {
                $(this).dropdown('clear');
            });

            $form.find('input, select, textarea').each(function () {
                if (this.setCustomValidity) this.setCustomValidity('');
            });
        }

        function generate_time_options(startHour = 7, endHour = 18, interval = 30) {
            const times = [];
            for (let hour = startHour; hour <= endHour; hour++) {
                for (let minutes = 0; minutes < 60; minutes += interval) {
                    const time = new Date();
                    time.setHours(hour);
                    time.setMinutes(minutes);
                    const label = time.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    times.push(label);
                }
            }
            return times;
        }

        function populateDropdown(menuId, timeArray) {
            const $menu = $(`#${menuId}`);
            $menu.empty();
            timeArray.forEach(time => {
                const item = `<div class="item" data-value="${time}">${time}</div>`;
                $menu.append(item);
            });
        }

        $(document).ready(function () {
            load_registered_users();
            const all_time_options = generate_time_options(7, 18, 30);

            populateDropdown("start_time_menu", all_time_options);
            populateDropdown("end_time_menu", all_time_options);

            $('#booking_start_dropdown').dropdown({
                direction: 'upward',
                onChange: function (value, text) {
                    const selectedIndex = all_time_options.indexOf(value);
                    if (selectedIndex === -1) return;

                    const endOptions = all_time_options.slice(selectedIndex + 1);
                    populateDropdown("end_time_menu", endOptions);

                    $('#booking_end_dropdown').dropdown('destroy');
                    $('#booking_end_dropdown').dropdown();

                    const current_end_value = $('#booking_end_dropdown').dropdown('get value');

                    if (!endOptions.includes(current_end_value)) {
                        $('#booking_end_dropdown').dropdown('clear');
                    }
                }
            });

            $('#booking_end_dropdown').dropdown({
                direction: 'upward'
            });
        });

        $('.validate_input').on('input change', function () {
            const icon_selector = $(this).data('icon');
            if ($(this).is('input[type="text"]')) {
                if (this.checkValidity() && this.value.length >= 5) {
                    $('#'+icon_selector).addClass('green');
                } 
                else {
                    $('#'+icon_selector).removeClass('green');
                }    
            }
            else {
                if (this.checkValidity()) {
                    $('#'+icon_selector).addClass('green');
                } 
                else {
                    $('#'+icon_selector).removeClass('green');
                }
            }
            
        });

        $('#car_dropdown').dropdown({
            onChange: function(value, text, $selected_item) {
                var color = $selected_item.attr('data-color');
                $('.car_label').addClass('hidden');

                if (color == 'red') {
                    $('#car_icon').removeClass('blue');
                    $('#car_icon').addClass(color);
                }
                else if (color == 'blue') {
                    $('#car_icon').removeClass('red');
                    $('#car_icon').addClass(color);
                }
                // $('#requestor_icon').addClass('hidden');
            }
        });
        $('#origin_drop, #destination_drop').dropdown({
            direction: 'upward'
        });

        function sync_dropdowns(changedId, targetId) {
            const changedValue = $(changedId).dropdown('get value');
            const $targetItems = $(targetId).find('.menu .item');

              $targetItems.removeClass('disabled');

            if (changedValue) {
                $targetItems.each(function () {
                    if ($(this).attr('data-value') === changedValue) {
                        $(this).addClass('disabled');
                    }
                });

                if ($(targetId).dropdown('get value') === changedValue) {
                    $(targetId).dropdown('clear');
                }
            }
        }

        $('#origin_drop').dropdown({
            direction: 'upward',
            onChange: function () {
                sync_dropdowns('#origin_drop', '#destination_drop');
            }
        });

        $('#destination_drop').dropdown({
            direction: 'upward',
            onChange: function () {
                sync_dropdowns('#destination_drop', '#origin_drop');
            }
        });

        $('#trip_booking_form')
            .form({
                on: 'change',
                inline: false,
                transition: 'fade',
                onSuccess: function(event) {
                    event.preventDefault();

                    var ajax = $.ajax({
                        method: 'POST',
                        url   : '<?php echo base_url();?>i.php/sys_control/save_vehicle_trip',
                        data  : new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false
                    });
                    var jqxhr = ajax
                        .always(function() {
                            var response = jqxhr.responseText;
                            if (response == success) {
                                alert('Trip booking confirmed. You may contact the driver via Messenger or phone number to coordinate the pick-up location.')
                            }
                            else {
                                alert('The selected schedule overlaps with an existing trip. Please choose a different schedule.')
                            }
                        })
                    ;
                },
                fields: {
                    requestor_id: {
                        identifier: 'requestor_id',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select a Requestor.'
                            }
                        ]
                    },
                    passengers_id: {
                        identifier: 'passengers_id',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select Passengers.'
                            }
                        ]
                    },
                    purpose: {
                        identifier: 'purpose',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please enter a Purpose.'
                            }
                        ]
                    },
                    car_selection: {
                        identifier: 'car_selection',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select a vehicle.'
                            }
                        ]
                    },
                    origin: {
                        identifier: 'origin',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select the origin.'
                            }
                        ]
                    },
                    destination: {
                        identifier: 'destination',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select the destination unless it\'s a Local Use trip.'
                            }
                        ]
                    },
                    vehicle_drop: {
                        identifier: 'vehicle_drop',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select a vehicle.'
                            }
                        ]
                    },
                    booking_start_time: {
                        identifier: 'booking_start_time',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select a start time.'
                            }
                        ]
                    },
                    booking_end_time: {
                        identifier: 'booking_end_time',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please select an end time.'
                            }
                        ]
                    }
                }
            })
        ;

        function load_calendar_schedules(calendar_date) {
            var ajax = $.ajax({
                method: 'POST',
                url   : '<?php echo base_url();?>i.php/sys_control/load_calendar_schedules',
                data  : {
                    trip_date: calendar_date
                }
            });
            var jqxhr = ajax
            .always(function() {
                var response_data = JSON.parse(jqxhr.responseText);
                if (response_data != '') {
                    $('#schedules_container').html('');
                    $.each(response_data, function(key, value) {
                        var schedule_id = value.schedule_id;
                        var first_name = value.first_name;
                        var middle_name = value.middle_name;
                        var last_name = value.last_name;
                        var suffix = value.suffix;
                        var position = value.position;
                        var image = value.image;
                        var timestamp = value.timestamp;
                        var trip_date = value.trip_date;
                        var vehicle_id = value.vehicle_id;
                        var origin = value.origin;
                        var destination = value.destination;
                        var start_time = value.start_time;
                        var end_time = value.end_time;
                        var vice_versa_check = value.vice_versa_check;

                        let full_name = first_name+' '+middle_name[0]+'. '+last_name

                        if (suffix != '') {
                            full_name += ' '+suffix+'.';
                        }
                        
                        let schedule_item = `
                            <div class="item">
                                <div class="right floated content">
                                    <div class="ui header tiny right aligned">
                                        <u>${origin.UCwords()} to ${destination.UCwords()}</u>
                                        <div class="description">
                                            <a>${start_time} - ${end_time}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="ui avatar image">
                                    <a class="header disabled">
                                        ${full_name.UCwords()}
                                        <div class="sub header">
                                            ${position}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        `;

                        // if (true) {}
                        
                        $('#schedules_container').append(schedule_item);
                    })
                }
                else {
                    $('#schedules_container').html('<h3 align="center">Empty</h3>');
                }
            })
        }

        function load_registered_users() {
            var ajax = $.ajax("<?php echo base_url();?>i.php/sys_control/load_registered_users");
            var jqxhr = ajax
            .always(function() {
                var response_data = JSON.parse(jqxhr.responseText);
                if (response_data != '') {
                    $('#users_drop_menu').html('');
                    $('#passengers_drop_menu').html('');
                    $.each(response_data, function(key, value) {
                        var requestor_id = value.requestor_id;
                        var first_name = value.first_name.UCwords();
                        var middle_name = value.middle_name.UCwords();
                        var last_name = value.last_name.UCwords();
                        var suffix = value.suffix.toUpperCase();
                        var gender = value.gender;
                        var position = value.position;
                        var phone_number = value.phone_number;
                        var username = value.username;
                        var email_address = value.email_address;
                        var image = value.image;
                        var registry_date = value.registry_date;
                        var designation_key = value.designation_key;

                        let full_name = first_name+' '+middle_name[0]+'. '+last_name

                        if (suffix != '') {
                            full_name += ' '+suffix+'.';
                        }
                        
                        let user_item = `
                            <div class="item requestor_option" data-value="`+requestor_id+`" data-requestor_id="`+requestor_id+`" data-image="`+image+`" data-full_name="`+full_name+`" data-position="`+position+`">
                                <div class="ui avatar image image_container">
                                    <img src="<?php echo base_url();?>photos/profile_pictures/`+image+`" class="center middle aligned flowing_image image bordered">
                                </div>
                                <span>`+full_name+`</span>
                            </div>
                        `;
                        
                        $('#users_drop_menu').append(user_item);
                        $('#passengers_drop_menu').append(user_item);
                    })
                    $('#users_drop')
                        .dropdown({
                            onChange: function() {
                                var input_value = $('#requestor_id').val();
                                var input_text = $('#users_drop').dropdown('get text');
                                $('#requestor_icon').addClass('hidden');
                            }
                        })
                    ;
                    $('#passengers_drop')
                        .dropdown({
                            maxSelections: 3,
                            onChange: function() {
                                // var input_value = $('#passengers_id').val();
                                // var input_text = $('#passengers_drop').dropdown('get text');
                                // alert(input_text)
                                // $('#passengers_icon').addClass('hidden');
                            }
                        })
                    ;
                }
            })
        }

        $('#next_month').click(() => {
            const next_date = new Date(current_year, current_month + 1);
            current_month = next_date.getMonth();
            current_year = next_date.getFullYear();
            render_calendar(current_month, current_year);
        });

        $('#prev_month').click(() => {
            const prev_date = new Date(current_year, current_month - 1);
            current_month = prev_date.getMonth();
            current_year = prev_date.getFullYear();
            render_calendar(current_month, current_year);
        });
    </script>
</body>
</html>
