<html>
    <head>
        <style>
            .circle-preview {
                display: none;
                width: 100px;
                height: 100px;
                background-color: lightblue;
                border-radius: 50%;
            }

            .rectangle-preview {
                display: none;
                width: 100px;
                height: 50px;
                background-color: lightgreen;
            }

            .triangle-preview {
                display: none;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 100px 100px 100px;
                border-color: transparent transparent #FF4532 transparent;
                transform: rotate(0deg);
            }
        </style>
    </head>
    <body>
        <form action="{{ route('calculate') }}" method="post">
            @csrf
            <label for="shape">Select a shape:</label>
            <select name="shape" id="shape">
                <option>---SELECT SHAPE---</option>
                <option value="circle">Circle</option>
                <option value="rectangle">Rectangle</option>
                <option value="triangle">Triangle</option>
            </select>
            <br>

            <div id="radius" style="display:none;">
                <label for="radius">Radius:</label>
                <input type="text" name="radius" id="radius">
            </div>

            <div id="rectangle" style="display:none;">
                <label for="length">Length:</label>
                <input type="text" name="length" id="length">
                <br>
                <label for="width">Width:</label>
                <input type="text" name="width" id="width">
            </div>

            <div id="triangle" style="display:none;">
                <label for="base">Base:</label>
                <input type="text" name="base" id="base">
                <br>
                <label for="height">Height:</label>
                <input type="text" name="height" id="height">
            </div>

            <div class="circle-preview" id="circlePreview"></div>
            <div class="rectangle-preview" id="rectanglePreview"></div>
            <div class="triangle-preview" id="trianglePreview"></div>

            <br>
            <button type="submit">Calculate</button>
        </form>

        <script>
            document.getElementById('shape').addEventListener('change', function () {
                var shape = this.value;
                document.getElementById('radius').style.display = shape === 'circle' ? 'block' : 'none';
                document.getElementById('rectangle').style.display = shape === 'rectangle' ? 'block' : 'none';
                document.getElementById('triangle').style.display = shape === 'triangle' ? 'block' : 'none';

                // Display the shape preview
                document.getElementById('circlePreview').style.display = shape === 'circle' ? 'block' : 'none';
                document.getElementById('rectanglePreview').style.display = shape === 'rectangle' ? 'block' : 'none';
                document.getElementById('trianglePreview').style.display = shape === 'triangle' ? 'block' : 'none';
            });
        </script>
    </body>
</html>
