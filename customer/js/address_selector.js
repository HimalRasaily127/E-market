$(function() {
    // events
    $('#province').on('change', my_handlers.fill_districts);
    $('#district').on('change', my_handlers.fill_cities);
    $('#Rural_municipality').on('change', my_handlers.fill_ward_nos);
    $('#ward_no').on('change', my_handlers.onchange_ward_no);

    // load province
    let dropdown = $('#province');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose province</option>');
    dropdown.prop('selectedIndex', 0);
    const url = 'province.json';
    // Populate dropdown with list of provinces
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
        })
    });

});
var my_handlers = {
    // fill district
    fill_districts: function() {
        //selected province
        var province_code = $(this).val();

        // set selected text to input
        var province_text = $(this).find("option:selected").text();
        let province_input = $('#province-text');
        province_input.val(province_text);
        //clear district & Rural_municipality & ward_no input
        $('#district-text').val('');
        $('#Rural_municipality-text').val('');
        $('#ward_no-text').val('');

        //district
        let dropdown = $('#district');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose State/district</option>');
        dropdown.prop('selectedIndex', 0);

        //Rural_municipality
        let Rural_municipality = $('#Rural_municipality');
        Rural_municipality.empty();
        Rural_municipality.append('<option selected="true" disabled></option>');
        Rural_municipality.prop('selectedIndex', 0);

        //ward_no
        let ward_no = $('#ward_no');
        ward_no.empty();
        ward_no.append('<option selected="true" disabled></option>');
        ward_no.prop('selectedIndex', 0);

        // filter & fill
        var url = ' district.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.province_code == province_code;
            });

            result.sort(function(a, b) {
                return a.district_name.localeCompare(b.district_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.district_code).text(entry.district_name));
            })

        });
    },
    // fill Rural_municipality
    fill_cities: function() {
        //selected district
        var district_code = $(this).val();

        // set selected text to input
        var district_text = $(this).find("option:selected").text();
        let district_input = $('#district-text');
        district_input.val(district_text);
        //clear Rural_municipality & ward_no input
        $('#Rural_municipality-text').val('');
        $('#ward_no-text').val('');

        //Rural_municipality
        let dropdown = $('#Rural_municipality');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose Rural_municipality/municipality</option>');
        dropdown.prop('selectedIndex', 0);

        //ward_no
        let ward_no = $('#ward_no');
        ward_no.empty();
        ward_no.append('<option selected="true" disabled></option>');
        ward_no.prop('selectedIndex', 0);

        // filter & fill
        var url = 'Rural_municipality.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.district_code == district_code;
            });

            result.sort(function(a, b) {
                return a.Rural_municipality_name.localeCompare(b.Rural_municipality_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.Rural_municipality_code).text(entry.Rural_municipality_name));
            })

        });
    },
    // fill ward_no
    fill_ward_nos: function() {
        // selected ward_no
        var Rural_municipality_code = $(this).val();

        // set selected text to input
        var Rural_municipality_text = $(this).find("option:selected").text();
        let Rural_municipality_input = $('#Rural_municipality-text');
        Rural_municipality_input.val(Rural_municipality_text);
        //clear ward_no input
        $('#ward_no-text').val('');

        // ward_no
        let dropdown = $('#ward_no');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose ward_no</option>');
        dropdown.prop('selectedIndex', 0);

        // filter & Fill
        var url = 'ward_no.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.Rural_municipality_code == Rural_municipality_code;
            });

            result.sort(function(a, b) {
                return a.ward_no_name.localeCompare(b.ward_no_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.ward_no_code).text(entry.ward_no_name));
            })

        });
    },

    onchange_ward_no: function() {
        // set selected text to input
        var ward_no_text = $(this).find("option:selected").text();
        let ward_no_input = $('#ward_no-text');
        ward_no_input.val(ward_no_text);
    },

};


