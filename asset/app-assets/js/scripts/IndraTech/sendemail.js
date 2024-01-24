function admSelectCheck(nameSelect) {

    if (nameSelect) {
      userValue = document.getElementById("users").value;
      othersValue = document.getElementById("others").value;

      if (userValue == nameSelect.value) {
        console.log(nameSelect.value, userValue)
        document.getElementById("linktes").required = false;
        document.getElementById("usercheck").style.display = "block";
        document.getElementById("otherscheck").style.display = "none";
      }
      
      if (othersValue == nameSelect.value) {
        console.log(nameSelect.value, othersValue)
        document.getElementById("linktes").required = true;
        document.getElementById("usercheck").style.display = "none";
        document.getElementById("otherscheck").style.display = "block";
      }
    } else {
      document.getElementById("usercheck").style.display = "block";
    }
  }