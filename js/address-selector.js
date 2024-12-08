document.addEventListener('DOMContentLoaded', () => {
    const test = document.getElementById('hot');
    test.innerHTML += '';

    // events
    const province = document.getElementById('province');
    const district = document.getElementById('district');
    const RuralMunicipality = document.getElementById('Rural_municipality');
    const wardNo = document.getElementById('ward_no');

    province.addEventListener('change', fillDistricts);
    district.addEventListener('change', fillCities);
    RuralMunicipality.addEventListener('change', fillWardNos);
    wardNo.addEventListener('change', onchangeWardNo);

    // load province
    const provinceDropdown = document.getElementById('province');
    provinceDropdown.innerHTML = `<option selected disabled>Choose province</option>`;

    fetch('json/province.json')
        .then(response => response.json())
        .then(data => {
            data.sort((a, b) => a.province_name.localeCompare(b.province_name))
                .forEach(entry => {
                    const option = document.createElement('option');
                    option.value = entry.province_code;
                    option.text = entry.province_name;
                    if (entry.province_code === '06') {
                        provinceDropdown.appendChild(option);
                    } else {
                      
                    }
                });
        });
});

function fillDistricts() {
    const provinceCode = this.value;
    const provinceText = this.options[this.selectedIndex].text;
    const provinceInput = document.getElementById('province-text');
    provinceInput.value = provinceText;

    const districtDropdown = document.getElementById('district');
    districtDropdown.innerHTML = `<option selected disabled>Choose district</option>`;

    const RuralMunicipalityDropdown = document.getElementById('Rural_municipality');
    RuralMunicipalityDropdown.innerHTML = `<option selected disabled>Choose Rural_municipality/municipality</option>`;

    const wardNoDropdown = document.getElementById('ward_no');
    wardNoDropdown.innerHTML = `<option selected disabled>Choose ward_no</option>`;

    fetch('json/district.json')
        .then(response => response.json())
        .then(data => {
            const result = data.filter(value => value.province_code === provinceCode);
            result.sort((a, b) => a.district_name.localeCompare(b.district_name));

            result.forEach(entry => {
                const option = document.createElement('option');
                option.value = entry.district_code;
                option.text = entry.district_name;
                districtDropdown.appendChild(option);
            });
        });
}

function fillCities() {
    const districtCode = this.value;
    const districtText = this.options[this.selectedIndex].text;
    const districtInput = document.getElementById('district-text');
    districtInput.value = districtText;

    const RuralMunicipalityDropdown = document.getElementById('Rural_municipality');
    RuralMunicipalityDropdown.innerHTML = `<option selected disabled>Choose Rural_municipality/municipality</option>`;

    const wardNoDropdown = document.getElementById('ward_no');
    wardNoDropdown.innerHTML = `<option selected disabled>Choose ward_no</option>`;

    fetch('json/Rural_municipality.json')
        .then(response => response.json())
        .then(data => {
            const result = data.filter(value => value.district_code === districtCode);
            result.sort((a, b) => a.Rural_municipality_name.localeCompare(b.Rural_municipality_name));

            result.forEach(entry => {
                const option = document.createElement('option');
                option.value = entry.Rural_municipality_code;
                option.text = entry.Rural_municipality_name;
                RuralMunicipalityDropdown.appendChild(option);
            });
        });
}

function fillWardNos() {
    const RuralMunicipalityCode = this.value;
    const RuralMunicipalityText = this.options[this.selectedIndex].text;
    const RuralMunicipalityInput = document.getElementById('Rural_municipality-text');
    RuralMunicipalityInput.value = RuralMunicipalityText;

    const wardNoDropdown = document.getElementById('ward_no');
    wardNoDropdown.innerHTML = `<option selected disabled>Choose ward_no</option>`;

    fetch('json/ward_no.json')
        .then(response => response.json())
        .then(data => {
            const result = data.filter(value => value.Rural_municipality_code === RuralMunicipalityCode);
            result.sort((a, b) => a.ward_no_name.localeCompare(b.ward_no_name));

            result.forEach(entry => {
                const option = document.createElement('option');
                option.value = entry.ward_no_code;
                option.text = entry.ward_no_name;
                wardNoDropdown.appendChild(option);
            });
        });
}

function onchangeWardNo() {
    const wardNoText = this.options[this.selectedIndex].text;
    const wardNoInput = document.getElementById('ward_no-text');
    wardNoInput.value = wardNoText;
}

