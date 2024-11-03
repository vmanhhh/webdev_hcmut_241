const handleCaculate = () => {
  const numberOne = document.getElementById("num_1").value * 1;
  const numberTwo = document.getElementById("num_2").value * 1;
  const cals = document.getElementById("cals").value;
  console.log(cals);

  let result = 0;

  switch (cals) {
    case "add":
      result = numberOne + numberTwo;
      break;
    case "sub":
      result = numberOne - numberTwo;
      break;
    case "mux":
      result = numberOne * numberTwo;
      break;
    case "div":
      if (numberTwo == 0) {
        alert("Phép tinh không thể thực hiện");
        break;
      }
      result = numberOne / numberTwo;
      break;
    case "pow":
      if (numberOne <= 0) {
        alert("Phép tinh không thể thực hiện");
        break;
      }
      result = Math.pow(numberOne, numberTwo);
      break;
    default:
      alert("Vui lòng chọn phép tính phù hợp");
      break;
  }

  document.getElementById("result").value = result;
  event.preventDefault();
};
