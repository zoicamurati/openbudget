@extends('layouts.app')
@push('head')
@endpush

@section('content')
    <div class="container-fluid" style="margin-top:5em;margin-bottom:6em">
        <div>
            <h2 class="text-center">Kerko</h2>
            <div class="container text-left">
                <div class="row justify-content-center">
                    <div class="col-md-5">


                        <select name="basic[]" multiple="multiple" id="category-filter"
                                class="1col active form-control">

                        </select>


                    </div>
                    <div class="col-md-5">


                        <select name="basic[]" multiple="multiple" id="inst-filter" class="2col active form-control">

                        </select>


                    </div>
                </div>
            </div>
        </div>

        <div id="chartdiv"></div>
    </div>
@endsection

@push('scripts')
    <!-- Resources -->
    <script src="{{ asset('js/jquery.multiselect.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('am5/index.js') }}"></script>
    <script src="{{ asset('am5/hierarchy.js') }}"></script>
    <script src="{{ asset('am5/Animated.js') }}"></script>

    <!-- Chart code -->
    <script>
        var series;
        am5.ready(function () {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

            const myTheme = am5.Theme.new(root);

         /*   myTheme.rule("RoundedRectangle", ["hierarchy", "node", "shape", "depth1"]).setAll({
                strokeWidth: 2
            });*/

          /*  myTheme.rule("RoundedRectangle", ["hierarchy", "node", "shape", "depth2"]).setAll({
                fillOpacity: 0,
                strokeWidth: 1,
                strokeOpacity: 0.2
            });*/

           /* myTheme.rule("Label", ["node", "depth1"]).setAll({
            });*/

            myTheme.rule("Label", ["node", "depth2"]).setAll({
                fontSize: 20,
            });

            root.setThemes([
                am5themes_Animated.new(root),
                myTheme
            ]);

            // Create wrapper container
            var container = root.container.children.push(
                am5.Container.new(root, {
                    width: am5.percent(100),
                    height: am5.percent(100),
                    layout: root.verticalLayout
                })
            );

            // Create series
            // https://www.amcharts.com/docs/v5/charts/hierarchy/#Adding
            var series = container.children.push(
                am5hierarchy.Treemap.new(root, {
                    sort: "descending",
                    singleBranchOnly: false,
                    downDepth: 1,
                    upDepth: 0,
                    initialDepth: 1,
                    valueField: "value",
                    categoryField: "name",
                    colorField: "color",
                    childDataField: "children",
                    nodePaddingOuter: 0,
                    nodePaddingInner: 0
                })
            );

            series.get("colors").set("step", 3);

            series.nodes.template.set("tooltipText", "{category}: [bold]{sum}[/]  [bold]ALL");

            container.children.moveValue(
                am5hierarchy.BreadcrumbBar.new(root, {
                    series: series
                }), 0
            );

            // Generate and set data
            // https://www.amcharts.com/docs/v5/charts/hierarchy/#Setting_data


            let data = {!! json_encode($data) !!};
            console.log(data)

            function processData(data) {
                var treeData = [];

                am5.object.eachOrdered(
                    data,
                    (brand) => {
                        console.log(brand)
                    },
                    (a, b) => {
                        let aval = 0;
                        let bval = 0;
                        am5.object.each(data[a], (key, val) => (aval += val));
                        am5.object.each(data[b], (key, val) => (bval += val));
                        if (aval > bval) return -1;
                        if (aval < bval) return 1;
                        return 0;
                    }
                );

                return data;
            }

            series.data.setAll(processData(data));
            series.set("selectedDataItem", series.dataItems[0]);

            series.bullets.push(function (root, series, dataItem) {
                var depth = dataItem.get("depth");

            });
            // Set up drill-down template


            // Extracting categories from the PHP variable encoded in JSON
            let categories = {!! json_encode($category) !!};
            // Convert associative array to array of objects
            var categoryArray = Object.keys(categories).map(function (key) {
                return {value: key, text: categories[key]};
            });


            // Selecting the dropdown element
            let dropdown = document.getElementById("category-filter");

            // Looping through categories and creating options
            categoryArray.forEach(function (category) {
                // Creating option element
                var option = document.createElement("option");
                // Setting value and text of the option
                option.value = category.value;
                option.text = category.text;
                // Appending the option to the dropdown
                dropdown.appendChild(option);
            });

            //Institutions
            // Extracting categories from the PHP variable encoded in JSON
            let institutions = {!! json_encode($institutions) !!};
            // Selecting the dropdown element
            let dropdown_inst = document.getElementById("inst-filter");

            // Looping through categories and creating options
            institutions.forEach(function (category) {
                // Creating option element
                var option = document.createElement("option");
                // Setting value and text of the option
                option.value = category.code;
                option.text = category.name;
                // Appending the option to the dropdown
                dropdown_inst.appendChild(option);
            });


            $('#category-filter, #inst-filter').on('change', function () {
                var selectedCategories = $('#category-filter').val();
                var selectedInstitutions = $('#inst-filter').val();
                console.log('Selected categories:', selectedCategories);
                console.log('Selected institutions:', selectedInstitutions);

                $.ajax({
                    url: '/api/get-data', // Replace with your API endpoint
                    method: 'POST', // or 'GET' depending on your API
                    data: {
                        category: selectedCategories,
                        institutions: selectedInstitutions
                    },
                    success: function (response) {
                        // Handle success response
                        var newData = processData(response['data']);
                        series.data.setAll(newData);
                        series.set("selectedDataItem", series.dataItems[0]);

                        console.log('API Response:', response['data']);
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.error('Error:', error);
                    }
                });
            });

        }); // end am5.ready()
    </script>
@endpush
