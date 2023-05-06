<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<input type="file" id="file" />
<button id="read-file">Read File</button>


<script >

    function chunkSubstr(str, size) {
        const numChunks = Math.ceil(str.length / size)
        const chunks = new Array(numChunks)

        console.log(numChunks);
        for (let i = 0, o = 0; i < numChunks; ++i, o += size) {
            chunks[i] = str.substr(o, size)
        }

        return chunks
    }

    function fileReader(theEvent) {
        var theFile = theEvent.target.files[0]; // target the loaded file
        if (theFile.type === "") {
            console.log("yep it's a binary");
        }
        var reader = new FileReader();  // initialize file reading object

        reader.onload = function(anotherEvent) {

            console.log(chunkSubstr(anotherEvent.target.result, 100));
            // var byteArray = Array.from(new Uint8Array(reader.result));
            // console.log(byteArray);
            // console.log(byteArray.join(" "));
        }
        // reader.readAsArrayBuffer(theFile);
        reader.readAsBinaryString(theFile);
    }

    document.getElementById("file").addEventListener("change", fileReader, false); // listener for file upload button

</script>
</body>
</html>
