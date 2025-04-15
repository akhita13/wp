let subjects = [];

function addSubject() {
    let subject = document.getElementById("subject").value;
    let attended = parseInt(document.getElementById("attended").value);
    let missed = parseInt(document.getElementById("missed").value);
    
    if (subject && !isNaN(attended) && !isNaN(missed)) {
        subjects.push({ subject, attended, missed });
        updateTable();
    }
}

function updateTable() {
    let tableBody = document.getElementById("attendanceTable");
    tableBody.innerHTML = "";
    let totalAttended = 0, totalMissed = 0;
    
    subjects.forEach(sub => {
        let total = sub.attended + sub.missed;
        let percentage = ((sub.attended / total) * 100).toFixed(2);
        let needed = Math.max(0, Math.ceil((0.75 * total - sub.attended) / 0.25));
        
        totalAttended += sub.attended;
        totalMissed += sub.missed;
        
        let row = `<tr>
            <td>${sub.subject}</td>
            <td>${sub.attended}</td>
            <td>${sub.missed}</td>
            <td>${total}</td>
            <td>${percentage}%</td>
            <td>${percentage < 75 ? needed : '✔'}</td>
        </tr>`;
        tableBody.innerHTML += row;
    });
    
    let overallPercentage = totalAttended + totalMissed > 0 ? ((totalAttended / (totalAttended + totalMissed)) * 100).toFixed(2) : 0;
    document.getElementById("overallAttendance").innerText = isNaN(overallPercentage) ? "0%" : `${overallPercentage}%`;
}
