// Array to store academic records
let records = [];

// Function to add a new academic record
function addRecord() {
    // Retrieve input values
    const academicYear = document.getElementById('academicYear').value;
    const className = document.getElementById('class').value;
    const semester = document.getElementById('semester').value;
    const subject = document.getElementById('subject').value;
    const marks = parseFloat(document.getElementById('marks').value);

    // Validate inputs
    if (!academicYear || !className || !semester || !subject || isNaN(marks)) {
        alert('Please fill in all fields correctly.');
        return;
    }

    // Calculate total marks and percentage
    const totalMarks = 100; // Assuming total marks for each subject is 100
    const percentage = ((marks / totalMarks) * 100).toFixed(2);

    // Create record object
    const record = {
        academicYear,
        className,
        semester,
        subject,
        marks,
        totalMarks,
        percentage
    };

    // Add record to records array
    records.push(record);

    // Update the table display
    displayRecords();

    // Clear the form inputs
    document.getElementById('reportForm').reset();
}

// Function to display records in the table
function displayRecords() {
    const tableBody = document.querySelector('#recordsTable tbody');
    tableBody.innerHTML = ''; // Clear existing records

    records.forEach((record, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${record.academicYear}</td>
            <td>${record.className}</td>
            <td>${record.semester}</td>
            <td>${record.subject}</td>
            <td>${record.marks}</td>
            <td>${record.totalMarks}</td>
            <td>${record.percentage}%</td>
            <td class="actions">
                <button onclick="deleteRecord(${index})">Delete</button>
            </td>
        `;

        tableBody.appendChild(row);
    });
}

// Function to delete a record
function deleteRecord(index){23}

