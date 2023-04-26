<?php


// 1 - Aanbrengen raaplaag
function shortcode_aanbrengen_raaplaag( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            kalkmortel = ( ( $( '#lengte' ).val() * $( '#breedte' ).val() * $( '#dikte' ).val() ) * 22.5 ).toFixed(1);
            cement = ( ( 1 * 1250 ) / ( 6 * 1750 ) * kalkmortel ).toFixed(0);
            
            $("#resultaat_kalkmortel").text( kalkmortel + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Aanbrengen Raaplaag</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte muur (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte muur (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Dikte laag (centimeter)</label>
        <input type="number" step="any" id="dikte">

        <p><strong>Hoeveelheid kalkmortel in kg:</strong><br />
        <span class="result" id="resultaat_kalkmortel">&nbsp;</span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong><br />
        <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'aanbrengen-raaplaag', 'shortcode_aanbrengen_raaplaag' );

// 2 - Aanbrengen kalk afwerklaag
function shortcode_aanbrengen_kalk_afwerklaag( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            kalkmortel = ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * 2.5 ).toFixed(1);
            cement = ( ( 1 * 1250 ) / ( 2 * 1250 ) * kalkmortel ).toFixed(0);
            
            $("#resultaat_kalkmortel").text( kalkmortel + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Aanbrengen Kalk Afwerklaag</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte muur (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte muur (meter)</label>
        <input type="number" step="any" id="breedte">

        <p><strong>Hoeveelheid kalkmortel:</strong> <span class="result" id="resultaat_kalkmortel">&nbsp;</span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'aanbrengen-kalk-afwerklaag', 'shortcode_aanbrengen_kalk_afwerklaag' );

// 3 - Aanbrengen schuurkalk afwerklaag
function shortcode_aanbrengen_schuurkalk_afwerklaag( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {
 
            kalkmortel = ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * 3.2 ).toFixed(1);
            cement = ( ( 0.125 * 1250 ) / ( 1 * 1600 ) * kalkmortel ).toFixed(1);
            kustharsdispersie = ( ( 0.00625 * 1060 ) / ( 0.125 * 1250 ) * cement ).toFixed(2);
            
            $("#resultaat_kalkmortel").text( kalkmortel + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
            $("#resultaat_kustharsdispersie").text( kustharsdispersie + " KG" );
        });   
    });
    </script>

    <h3>Aanbrengen Schuurkalk Afwerklaag</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte muur (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte muur (meter)</label>
        <input type="number" step="any" id="breedte">

        <p><strong>Hoeveelheid schuurkalk in kg:</strong> <span class="result" id="resultaat_kalkmortel">&nbsp;</span></p>

        <p><strong>Hoeveelheid witte cemement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>

        <p><strong>Hoeveelheid kunstharsdispersie:</strong> <span class="result" id="resultaat_kustharsdispersie">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'aanbrengen-schuurkalk-afwerklaag', 'shortcode_aanbrengen_schuurkalk_afwerklaag' );

// 4 - Zandbak vullen
function shortcode_vullen_zandbak( $atts, $content ) { 
    ob_start(); ?>

    <script>
    jQuery(document).ready(function($){
        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {
            $( '#resultaat' ).text( ( $( '#lengte' ).val() * $( '#breedte' ).val() * ( $( '#hoogte' ).val() / 100 ) * ( 1300 / 0.95 ) ).toFixed(0) + ' KG' );
        });   
    });
    </script>

    <h3>De benodigde hoeveelheid speelzand om de zandbak te vullen</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (centimeter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Benodigde hoeveelheid speelzand:</strong> <span class="result" id="resultaat"></span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'vullen-zandbak', 'shortcode_vullen_zandbak' );

// 5 - Ophogen terrein
function shortcode_ophogen_terrein( $atts, $content ) { 
    ob_start(); ?>

    <script>
    jQuery(document).ready(function($){
        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {
            $( '#resultaat' ).text( ( $( '#lengte' ).val() * $( '#breedte' ).val() * $( '#hoogte' ).val() * ( 1300 / 0.8 ) ).toFixed(0) + ' KG' );
        });   
    });
    </script>

    <h3>Ophogen terrein</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Benodigde hoeveelheid ophoogzand:</strong> <span class="result" id="resultaat"></span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'ophogen-terrein', 'shortcode_ophogen_terrein' );

// 6 - Stabiliseren grond
function shortcode_stabiliseren_grond( $atts, $content ) { 
    ob_start(); ?>

    <script>
        jQuery(document).ready(function($) {

            $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

                ophoogzand = ( ( $( '#lengte' ).val() * $( '#breedte' ).val() * $( '#hoogte' ).val() * ( 1300 / 0.8 ) ) ).toFixed(0);
                cement = ( ( 1 * 1250 ) / ( 8 * 1300 ) * ophoogzand ).toFixed(0);
    
                $("#resultaat_ophoogzand").text( ophoogzand + " KG" );
                $("#resultaat_cement").text( cement + " KG" );
            });   
        });
    </script>

    <h3>Stabiliseren Grond</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Benodigde hoeveelheid ophoogzand:</strong> <span class="result" id="resultaat_ophoogzand"></span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'stabiliseren-grond', 'shortcode_stabiliseren_grond' );

// 7 - Voegen
function shortcode_voegen( $atts, $content ) { 
    ob_start(); ?>

    <script>
        jQuery(document).ready(function($) {

            type_steen = $( 'input[name=type_steen]:checked', '#rekentool' ).val();

            $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

                type_steen = $( 'input[name=type_steen]:checked', '#rekentool' ).val();
                if ( type_steen == 'waalformaat' ) {
                    factor_voeg = 3.6;
                    factor_steen = 53.8;
                } else if ( type_steen == 'maasformaat' ) {
                    factor_voeg = 3.1;
                    factor_steen = 76.2;
                }

                voegzand = ( ( $( '#oppervlakte' ).val() * factor_voeg ) ).toFixed(0);
                cement = ( ( ( 1 * 1250 ) / ( 4 * 1400 ) ) * voegzand).toFixed(0);
                stenen = ( ( voegzand ) / ( factor_steen / 1000 ) ).toFixed(0);

                $("#resultaat_voegzand").text( voegzand + " KG" );
                $("#resultaat_cement").text( cement + " KG" );
                $("#resultaat_stenen").text( stenen );
            });   
        });
    </script>

    <h3>Voegen</h3>

    <form id="rekentool" class="calculator">

        <span class="radiobuttons">
            <p>Type steen</p>
            <label>Waalformaat<input type="radio" id="waalformaat" name="type_steen" value="waalformaat" checked></label>
            <label>Maasformaat<input type="radio" id="maasformaat" name="type_steen" value="maasformaat"></label>
        </span>

        <label for="oppervlakte">Oppervlakte (m2)</label>
        <input type="number" step="any" id="oppervlakte">

        <p><strong>Benodigde aantal stenen:</strong> <span class="result" id="resultaat_stenen"></span></p>

        <p><strong>Benodigde hoeveelheid voegzand:</strong> <span class="result" id="resultaat_voegzand"></span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'voegen', 'shortcode_voegen' );

// 8 - Metselen
function shortcode_metselen( $atts, $content ) { 
    ob_start(); ?>

    <script>
        jQuery(document).ready(function($) {

            cementsoort = $( 'input[name=cementsoort]:checked', '#rekentool' ).val();
            $( '#cement_soort' ).text( cementsoort );
            type_steen = $( 'input[name=type_steen]:checked', '#rekentool' ).val();

            $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

                cementsoort = $( 'input[name=cementsoort]:checked', '#rekentool' ).val();
                if ( cementsoort == 'cement' ) {
                    kg_meter = 1250;
                } else if ( cementsoort == 'metselcement' ) {
                    kg_meter = 1000;
                }

                type_steen = $( 'input[name=type_steen]:checked', '#rekentool' ).val();
                if ( type_steen == 'waalformaat' ) {
                    factor_steen = 27.3;
                } else if ( type_steen == 'maasformaat' ) {
                    factor_steen = 29.4;
                }

                metselzand = ( ( $( '#oppervlakte' ).val() * factor_steen ) ).toFixed(0);
                cement = ( ( ( 1 * kg_meter ) / ( 3 * 1400 ) ) * metselzand).toFixed(0);
                
                $("#cement_soort").text( cementsoort );
                $("#resultaat_metselzand").text( metselzand + " KG" );
                $("#resultaat_cement").text( cement + " KG" );
            });   
        });
    </script>

    <h3>Metselen</h3>

    <form id="rekentool" class="calculator">

        <span class="radiobuttons">
            <p>Type cement</p>
            <label>Cement<input type="radio" id="cement" name="cementsoort" value="cement"></label>
            <label>Metselcement<input type="radio" id="metselcement" name="cementsoort" value="metselcement" checked></label>
        </span>

        <span class="radiobuttons">
            <p>Type steen</p>
            <label>Waalformaat<input type="radio" id="waalformaat" name="type_steen" value="waalformaat" checked></label>
            <label>Maasformaat<input type="radio" id="maasformaat" name="type_steen" value="maasformaat"></label>
        </span>

        <label for="oppervlakte">Oppervlakte (m2)</label>
        <input type="number" step="any" id="oppervlakte">

        <p><strong>Benodigde hoeveelheid metselzand:</strong> <span class="result" id="resultaat_metselzand"></span></p>

        <p><strong>Hoeveelheid <span id="cement_soort"></span> toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'metselen', 'shortcode_metselen' );

// 9 - Storten cementdekvloer zonder afwerking
function shortcode_storten_cementdekvloer_zonder_afwerking( $atts, $content ) {
    ob_start(); ?>

    <script>
        jQuery(document).ready(function($) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            vloerzand_0_5 = ( ( 1780 / 1 ) * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) / 100 ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 3 * ( 1500 * 1.11 ) ) * vloerzand_0_5 ).toFixed(0);

            $("#resultaat_vloerzand_0_5").text( vloerzand_0_5 + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Storten cementdekvloer zonder afwerking</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (centimeter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid vloerzand:</strong> <span class="result" id="resultaat_vloerzand_0_5">&nbsp;</span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'storten-cementdekvloer-zonder-afwerking', 'shortcode_storten_cementdekvloer_zonder_afwerking' );

// 10 - Storten cementdekvloer met afwerking
function shortcode_storten_cementdekvloer_met_afwerking( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            vloerzand_0_5 = 1820 * ( $( '#lengte' ).val() * $( '#breedte' ).val() * ( $( '#hoogte' ).val() / 100 ) ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 3 * ( 1400 / 1.11 ) ) * vloerzand_0_5 ).toFixed(0);

            vloerzand_0_5 = ( ( 1820 / 1 ) * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) / 100 ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 4 * ( 1400 * 1.18 ) ) * vloerzand_0_5 ).toFixed(0);

            $("#resultaat_vloerzand_0_5").text( vloerzand_0_5 + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Storten cementdekvloer met afwerking</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (centimeter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid vloerzand:</strong> <span class="result" id="resultaat_vloerzand_0_5">&nbsp;</span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'storten-cementdekvloer-met-afwerking', 'shortcode_storten_cementdekvloer_met_afwerking' );

// 11 - Storten eenvoudig betonwerk
function shortcode_storten_eenvoudig_betonwerk( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            betonzand = ( ( 750 / 1 ) * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) ).toFixed(0);
            betongrind_4_32 = ( ( 3 * 1600 ) / ( 2 * 1500 ) * betonzand ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 2 * 1500 ) * betonzand ).toFixed(0);

            $("#resultaat_betonzand").text( betonzand + " KG" );
            $("#resultaat_betongrind_4_32").text( betongrind_4_32 + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Storten eenvoudig betonwerk</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid betonzand:</strong> <span class="result" id="resultaat_betonzand">&nbsp;</span></p>
        <p><strong>Hoeveelheid betongrind 4-32:</strong> <span class="result" id="resultaat_betongrind_4_32">&nbsp;</span></p>
        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'storten-eenvoudig-betonwerk', 'shortcode_storten_eenvoudig_betonwerk' );

// 12 - Storten kifbeton (NIET IN GEBRUIK!)
function shortcode_storten_kifbeton( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            vloerzand_0_5 = 1820 * ( $( '#lengte' ).val() * $( '#breedte' ).val() * ( $( '#hoogte' ).val() / 100 ) ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 3 * ( 1400 / 1.11 ) ) * vloerzand_0_5 ).toFixed(0);

            vloerzand_0_5 = ( ( 1820 / 1 ) * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 4 * ( 1400 * 1.18 ) ) * vloerzand_0_5 ).toFixed(0);

            $("#resultaat_vloerzand_0_5").text( vloerzand_0_5 + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Storten kifbeton</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid vloerzand:</strong> <span class="result" id="resultaat_vloerzand_0_5">&nbsp;</span></p>
        <p><strong>Hoeveelheid grind 2-5:</strong> <span class="result" id="resultaat_grind_2_5">&nbsp;</span></p>

        <p><strong>Hoeveelheid vloerzand:</strong> <span class="result" id="resultaat_vloerzand_0_5">&nbsp;</span></p>
        <p><strong>Hoeveelheid grind 4-8:</strong> <span class="result" id="resultaat_grind_4_8">&nbsp;</span></p>

        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'storten-kifbeton', 'shortcode_storten_kifbeton' );

// 13 - Aanleggen tuinpad
function shortcode_aanleggen_tuinpad( $atts, $content ) { 
    ob_start(); ?>

    <script>
    jQuery(document).ready(function($){
        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {
            grind_8_16 = ( ( ( ( 16 + 8 ) / 2 ) * 4 * 0.001 ) * $( '#lengte' ).val() * $( '#breedte' ).val() * 1600 ).toFixed(0);
            $( '#resultaat_grind_8_16' ).text( grind_8_16 + ' KG' );
        });   
    });
    </script>

    <h3>Aanleggen tuinpad</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <p><strong>Benodigde hoeveelheid grind:</strong> <span class="result" id="resultaat_grind_8_16"></span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'aanleggen-tuinpad', 'shortcode_aanleggen_tuinpad' );

// 14 - Aanbrengen ballastlaag dak
function shortcode_aanbrengen_ballastlaag_dak( $atts, $content ) { 
    ob_start(); ?>

    <script>
    jQuery(document).ready(function($){
        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {
            grind_16_32 = ( $( '#lengte' ).val() * $( '#breedte' ).val() * ( $( '#hoogte' ).val() / 100 ) * 1600 ).toFixed(0);
            $( '#resultaat_grind_16_32' ).text( grind_16_32 + ' KG' );
        });   
    });
    </script>

    <h3>Aanbrengen ballastlaag dak</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (centimeter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Benodigde hoeveelheid grind:</strong> <span class="result" id="resultaat_grind_16_32"></span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'aanbrengen-ballastlaag-dak', 'shortcode_aanbrengen_ballastlaag_dak' );

// 15 - Betonstorten onbelaste toepassingen
function shortcode_betonstorten_onbelaste_toepassingen( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            grindzand = ( 1815 * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 4.7 * 1500 ) * grindzand ).toFixed(0);

            $("#resultaat_grindzand").text( grindzand + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Betonstorten onbelaste toepassingen</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid grindzand:</strong> <span class="result" id="resultaat_grindzand">&nbsp;</span></p>
        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'betonstorten-onbelaste-toepassingen', 'shortcode_betonstorten_onbelaste_toepassingen' );

// 16 - Betonstorten voor belaste toepassingen
function shortcode_betonstorten_belaste_toepassingen( $atts, $content ) {
    ob_start(); ?>

    <script>
    jQuery( document ).ready( function( $ ) {

        $( 'form' ).on( 'keyup change', 'input, select, textarea', function() {

            parelbetonmix = ( 1815 * ( ( $( '#lengte' ).val() * $( '#breedte' ).val() ) * $( '#hoogte' ).val() ) ).toFixed(0);
            cement = ( ( 1 * 1250 ) / ( 4.7 * 1500 ) * parelbetonmix ).toFixed(0);

            $("#resultaat_parelbetonmix").text( parelbetonmix + " KG" );
            $("#resultaat_cement").text( cement + " KG" );
        });   
    });
    </script>

    <h3>Betonstorten voor belaste toepassingen</h3>

    <form id="rekentool" class="calculator">

        <label for="lengte">Lengte (meter)</label>
        <input type="number" step="any" id="lengte">

        <label for="breedte">Breedte (meter)</label>
        <input type="number" step="any" id="breedte">

        <label for="hoogte">Hoogte (meter)</label>
        <input type="number" step="any" id="hoogte">

        <p><strong>Hoeveelheid parelbetonmix:</strong> <span class="result" id="resultaat_parelbetonmix">&nbsp;</span></p>
        <p><strong>Hoeveelheid cement toevoegen:</strong> <span class="result" id="resultaat_cement">&nbsp;</span></p>
    </form>

    <?php 
    return ob_get_clean();
}
add_shortcode( 'betonstorten-belaste-toepassingen', 'shortcode_betonstorten_belaste_toepassingen' );