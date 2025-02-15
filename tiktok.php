<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CXOFB TikTok Video Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            padding: 10px;
            background-color: #000;
            color: white;
            text-align: center;
        }
        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: url('https://i.ibb.co/hFjTNh0p/file-507.jpg') no-repeat center/cover;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
            margin-bottom: 10px;
        }
        h1 {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            text-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
            animation: glow 1.5s infinite alternate;
        }
        @keyframes glow {
            from {
                text-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
            }
            to {
                text-shadow: 0 0 10px rgba(0, 123, 255, 1);
            }
        }
        .container {
            max-width: 300px;
            width: 100%;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #007bff;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
            color: #007bff;
            font-weight: bold;
            background-color: black;
            text-align: center;
            font-size: 12px;
        }
        input::placeholder {
            color: #007bff;
            font-weight: bold;
        }
        button {
            padding: 5px 10px;
            font-size: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
        }
        button:hover {
            background-color: #0056b3;
        }
        #videoPreview {
            width: 100%;
            margin-top: 10px;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        video {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }
        .join-channel {
            margin-top: 10px;
            font-size: 10px;
        }
        .join-channel button {
            padding: 3px 6px;
            font-size: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
        }
    </style>
</head>
<body>
    <div class="profile-img"></div>
    <h1>CXOFB TikTok Video Downloader</h1>
    <div class="container">
        <form id="videoForm" method="POST">
            <input type="text" name="videoLink" placeholder="ENTER VIDEO LINK" required>
            <button type="submit">Fetch Video</button>
        </form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videoLink = $_POST['videoLink'];

    $url = 'https://tiktok-video-no-watermark10.p.rapidapi.com/index/Tiktok/getVideoInfo';
    $headers = [
        "X-Rapidapi-Key: d6311d2781mshc02d8d9dcf166f7p15802bjsn3b5ebe494a49",
        "X-Rapidapi-Host: tiktok-video-no-watermark10.p.rapidapi.com",
        "Content-Type: application/x-www-form-urlencoded"
    ];
    $data = http_build_query(["url" => $videoLink]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);

    if (isset($responseData['data']['play'])) {
        $videoUrl = $responseData['data']['play'];
        echo json_encode(["success" => true, "videoUrl" => $videoUrl]);
    } else {
        echo json_encode(["success" => false, "message" => "Unable to fetch video URL."]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CXOFB TikTok Video Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: #007bff;
            text-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
            animation: glow 1.5s infinite alternate;
        }
        @keyframes glow {
            from {
                text-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
            }
            to {
                text-shadow: 0 0 20px rgba(0, 123, 255, 1);
            }
        }
        .container {
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #007bff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
            color: #007bff;
            font-weight: lighter;
        }
        input::placeholder {
            color: #007bff;
            font-weight: lighter;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
        }
        button:hover {
            background-color: #0056b3;
        }
        video {
            max-width: 100%;
            margin-top: 20px;
            border-radius: 10px;
        }
        .join-channel {
            margin-top: 20px;
            font-size: 14px;
        }
        .join-channel button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
        }
    </style>
</head>
<body>
    <h1>CXOFB TikTok Video Downloader</h1>
    <div class="container">
        <form id="videoForm" method="POST">
            <input type="text" name="videoLink" placeholder="Enter Video Link" required>
            <button type="submit">Fetch Video</button>
        </form>

        <div id="videoPreview" style="display: none;">
            <video id="previewVideo" controls></video>
            <a id="downloadLink" download="video.mp4">
                <button>Download Video</button>
            </a>
        </div>

        <div class="join-channel">
            <button onclick="window.location.href='https://www.youtube.com/channel/your-channel-link'">JOIN MY CHANNEL</button>
        </div>
    </div>

    <script>
        document.getElementById('videoForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const response = await fetch('', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                const videoUrl = result.videoUrl;
                const videoPreview = document.getElementById('videoPreview');
                const previewVideo = document.getElementById('previewVideo');
                const downloadLink = document.getElementById('downloadLink');

                previewVideo.src = videoUrl;
                downloadLink.href = videoUrl;

                videoPreview.style.display = 'block';

            } else {
                alert(result.message);
            }
        });
    </script> 
</body>
</html>

