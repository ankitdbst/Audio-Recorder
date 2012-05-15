function sendFile(applet_id) {
    var recorder = document.getElementById(applet_id);
    if (recorder == null) {
      alert("Recorder not found!");
      return;
    }

    var duration = parseInt(recorder.sendGongRequest("GetMediaDuration", "audio")) || 0;
    if (duration <= 0) {
      alert("No recording found!");
      return;
    }

    // upload the voice file to the server
    var msg = recorder.sendGongRequest("PostToForm","record.php?save=1", "voicefile", "cookie=nanogong", "myfile");
    alert(msg);
}
