const createTable = () => { 
    let table = document.createElement('table'); // Tạo ra thẻ table
    let tbody = document.createElement('tbody'); // Tạo ra thẻ tbody

    table.appendChild(tbody); // Chèn tbody vào table

    // Chèn class table and table-bordered
    table.classList.add('table') ;
    table.classList.add('table-bordered');

    document.querySelector('#table').appendChild(table); // Chèn table vào thẻ có id là table

    // Creating and adding data to titile row of the table;
    let row = document.createElement('tr');
    let row_data_1 = document.createElement('th');
    row_data_1.innerHTML = 'Column';
    let row_data_2 = document.createElement('th');
    row_data_2.innerHTML = 'Column';
    row.appendChild(row_data_1);
    row.appendChild(row_data_2);
    tbody.appendChild(row);
    
    // Creating and adding data to first row of the table;
    let row_1 = document.createElement('tr');
    let row_1_data_1 = document.createElement('td');
    row_1_data_1.innerHTML = '0';
    let row_1_data_2 = document.createElement('td');
    row_1_data_2.innerHTML = '1';
    row_1.appendChild(row_1_data_1);
    row_1.appendChild(row_1_data_2);
    tbody.appendChild(row_1);

    // Creating and adding data to second row of the table;
    let row_2 = document.createElement('tr');
    let row_2_data_1 = document.createElement('td');
    row_2_data_1.innerHTML = '2';
    let row_2_data_2 = document.createElement('td');
    row_2_data_2.innerHTML = '3';
    row_2.appendChild(row_2_data_1);
    row_2.appendChild(row_2_data_2);
    tbody.appendChild(row_2);
} 

const insertRowTable = () => { 
    const numberTable = document.querySelector('#table').getElementsByTagName('table').length;
    for(let i = 0; i < numberTable; i++){
        let table = document.querySelector('#table').getElementsByTagName('tbody')[i];
        let lastRow = table.rows.length - 1;
        let len = table.rows[lastRow].cells.length;
        table.insertRow(lastRow+1);
        for(let j=0; j<len; j++){
            table.rows[lastRow+1].insertCell(j);
            table.rows[lastRow+1].cells[j].innerHTML = j + 1;
        }
    }
}

const insertColumnTable = () => {
    const tables = document.getElementById('table').getElementsByTagName('table');
    const numberTable = tables.length;

    for (let i = 0; i < numberTable; i++) {
        const table = tables[i];
        
        const firstRow = table.rows[0];
        const newCell = firstRow.insertCell(firstRow.cells.length);
        newCell.innerHTML = 'Column';

        for (let j = 1, n = table.rows.length; j < n; j++) {    
            const newRowCell = table.rows[j].insertCell(firstRow.cells.length - 1);
            newRowCell.innerHTML = j;
        }
    }
}

const deleteRowTable = () => {
	let valueRow = document.getElementById('rowInput').value;
	if (valueRow <= 1)
		alert("Please enter number > 1")
	else {
		const numberTable = document.getElementById('table').getElementsByTagName('table').length;
		for (let i = 0; i < numberTable; i++) {
            let len = document.getElementById('table').getElementsByTagName('tbody')[i].rows.length;
            if(len >= valueRow) {
    			document.getElementById("table").getElementsByTagName('tbody')[i].deleteRow(valueRow - 1);  
            }
            else {
                alert("No exit row");
            }
			if (!document.getElementById("table").getElementsByTagName('tbody')[i].hasChildNodes()) {
				document.getElementById("table").removeChild(document.getElementById("table").lastElementChild)
			}
            if (len-1 <= 1) {
    			document.getElementById("table").getElementsByTagName('tbody')[i].deleteRow(0);  
            }
		}
	}
}

const deleteColumnTable = () => {
	let valueColumn = document.getElementById('columnInput').value;
	if (valueColumn <= 0)
		alert("Please enter number > 0")
	else {
		const numberTable = document.getElementById('table').getElementsByTagName('table').length;
		for (let i = 0; i < numberTable; i++) {
			let table = document.getElementById('table').getElementsByTagName('tbody')[i];
            let len = table.rows[0].cells.length;
			for (let j = 0, n = table.rows.length; j < n; j++) {
				if (valueColumn <= 0) {
					alert("Please enter number > 0")
                }
				else {
                    if(len >= valueColumn){
    					table.rows[j].deleteCell(valueColumn - 1);
                    } else {
                        alert('No exit column')
                    } 
                }
			}
			if (!document.getElementById("table").getElementsByTagName('tbody')[i].getElementsByTagName('tr')[0].hasChildNodes()) {
				document.getElementById("table").removeChild(document.getElementById("table").lastElementChild)
            }
		}
	}
}

const deleteAllTable = () => { 
    const numberTable = document.getElementById('table').getElementsByTagName('table').length;
	for (let i = 0; i < numberTable; i++) {
		let table = document.getElementById("table");
		let child = table.lastElementChild;
		while (child) {
			table.removeChild(child);
			child = table.lastElementChild;
		}
	}
}
