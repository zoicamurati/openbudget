<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>BCT Treemap Chart 12</title>
    <link href="https://playground.anychart.com/docs/samples/BCT_Treemap_Chart_12/iframe" rel="canonical">
    <meta content="Treemap Chart" name="keywords">
    <meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://cdn.anychart.com/releases/8.12.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4"
          rel="stylesheet" type="text/css">
    <style>html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        button {
            margin: 10px 0 0 10px;
        }

        #container {
            position: absolute;
            width: 100%;
            top: 35px;
            bottom: 0;
        }</style>
</head>
<body>
<button onclick="headersEnabled(false)">Disable Headers</button>
<button onclick="headersEnabled(true)">Enable Headers</button>
<div id="container"></div>
<script
    src="https://cdn.anychart.com/releases/8.12.0/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script
    src="https://cdn.anychart.com/releases/8.12.0/js/anychart-treemap.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script
    src="https://cdn.anychart.com/releases/8.12.0/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script
    src="https://cdn.anychart.com/releases/8.12.0/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script type="text/javascript">

    anychart.onDocumentReady(function () {

        // create a chart and set the data
        var chart = anychart.treeMap(getData(), "as-tree");

        // set the maximum depth of levels shown
        chart.maxDepth(3);

        // set the depth of hints
        chart.hintDepth(1);

        // set the opacity of hints
        chart.hintOpacity(0.7);

        // configure labels
        chart.labels().format("{%name}, {%value}");
        // configure the text of headers in the hovered state
        chart.hovered().headers().format("{%name}, {%value}");
        // disable tooltips
        chart.tooltip(false);

        // set the chart title
        chart.title("Treemap: Depth and Hints");

        // set the container id
        chart.container("container");

        // initiate drawing the chart
        chart.draw();
    });

    // get data
    function getData() {
        // create data
      /*  var data = [
            {
                name: "Root",
                children: [
                    {
                        name: "Item 1", children: [
                            {
                                name: "Item 1-1", children: [
                                    {name: "Item 1-1-1", value: 1000},
                                    {name: "Item 1-1-2", value: 600},
                                    {name: "Item 1-1-3", value: 550},
                                    {name: "Item 1-1-4", value: 300},
                                    {name: "Item 1-1-5", value: 150}
                                ]
                            },
                            {name: "Item 1-2", value: 2300},
                            {name: "Item 1-3", value: 1500}
                        ]
                    },
                    {
                        name: "Item 2", children: [
                            {
                                name: "Item 2-1", children: [
                                    {name: "Item 2-1-1", value: 2100},
                                    {name: "Item 2-1-2", value: 1000},
                                    {name: "Item 2-1-3", value: 800},
                                    {name: "Item 2-1-4", value: 750}
                                ]
                            },
                            {
                                name: "Item 2-2", children: [
                                    {name: "Item 2-2-1", value: 560},
                                    {name: "Item 2-2-2", value: 300},
                                    {name: "Item 2-2-3", value: 150},
                                    {name: "Item 2-2-4", value: 90}
                                ]
                            },
                            {name: "Item 2-3", value: 400}
                        ]
                    },
                    {
                        name: "Item 3",
                        children: [
                            {
                                name: "Item 3-1", children: [
                                    {name: "Item 3-1-1", value: 850},
                                    {name: "Item 3-1-2", value: 400},
                                    {name: "Item 3-1-3", value: 150}
                                ]
                            },
                            {name: "Item 3-2", value: 1350},
                            {name: "Item 3-3", value: 1300},
                            {
                                name: "Item 3-4", children: [
                                    {name: "Item 3-4-1", value: 400},
                                    {name: "Item 3-4-2", value: 300},
                                    {name: "Item 3-4-3", value: 250},
                                    {name: "Item 3-4-4", value: 150}
                                ]
                            }
                        ]
                    }
                ]
            }
        ];*/
        let data= {!! json_encode($data) !!};
        console.log(data)
        return data;
    }

    /* anychart.onDocumentReady(function () {
         let data={!! json_encode($data) !!}
    // create data
   /!* var data = [
        {
            name: "Slavic Languages",
            children: [
                {
                    name: "East Slavic", children: [
                        {name: "Russian", value: 150000000},
                        {name: "Ukrainian", value: 45000000},
                        {name: "Belarusian", value: 3200000}
                    ]
                },
                {
                    name: "West Slavic", children: [
                        {name: "Polish", value: 55000000},
                        {name: "Czech", value: 10600000},
                        {name: "Slovak", value: 5200000}
                    ]
                },
                {
                    name: "South Slavic", children: [
                        {name: "Serbo-Croatian", value: 21000000},
                        {name: "Bulgarian", value: 9000000},
                        {name: "Slovene", value: 2500000},
                        {name: "Macedonian", value: 1400000}
                    ]
                }
            ]

        }
    ];*!/

    // create a chart and set the data
    chart = anychart.treeMap(data, "as-tree");

    // set the maximum depth of levels shown
    chart.maxDepth(3);

    // configure the text of headers in the hovered state
    chart.hovered().headers().format("{%value}");

    // configure the font of headers
    chart.normal().headers().fontColor("#990000");
    chart.normal().headers().fontSize("14");
    chart.normal().headers().fontWeight('bold');
    chart.hovered().headers().fontColor("#000099");

    // set the chart title
    chart.title().useHtml(true);
    chart.title("Treemap: Headers<br><br>" +
        "<span style='font-size:12; font-style:italic'>" +
        "Slavic Languages by Number of Speakers</span>");

    // set the container id
    chart.container("container");

    // initiate drawing the chart
    chart.draw();
});*/

</script>
</body>
</html>
