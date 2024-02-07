<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 100%;
    }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/hierarchy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function () {
// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        const myTheme = am5.Theme.new(root);

        myTheme.rule("RoundedRectangle", ["hierarchy", "node", "shape", "depth1"]).setAll({
            strokeWidth: 2
        });

        myTheme.rule("RoundedRectangle", ["hierarchy", "node", "shape", "depth2"]).setAll({
            fillOpacity: 0,
            strokeWidth: 1,
            strokeOpacity: 0.2
        });

        myTheme.rule("Label", ["node", "depth1"]).setAll({
            forceHidden: false
        });

        myTheme.rule("Label", ["node", "depth2"]).setAll({
            fontSize: 20
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
        // Set colors for each category

        series.nodes.template.set("tooltipText", "{category}: [bold]{sum}[/]  [bold]ALL");


        /* series.labels.template.setAll({
             text: "{category}: [bold]{sum}[/] [bold]ALL",
             fontSize: 20
         });*/
        /*series.labels.template.setAll({
            fontSize: 20,
            fill: am5.color(0x550000),
            text: "{category}"
        });*/
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

    }); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
