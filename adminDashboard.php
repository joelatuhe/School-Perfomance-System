<div class="dashboard-container">
    <div class="dashboard-header">
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <div class="card-icon card-students">🎓</div>
                <div class="card-info">
                    <div class="card-value" id="total-students">16</div>
                    <div class="card-label">Total Students</div>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon card-employees">👨‍💼</div>
                <div class="card-info">
                    <div class="card-value" id="total-employees">3</div>
                    <div class="card-label">Total Employees</div>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon card-subjects">📚</div>
                <div class="card-info">
                    <div class="card-value" id="total-subjects">4</div>
                    <div class="card-label">Total Subjects</div>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon card-holidays">📅</div>
                <div class="card-info">
                    <div class="card-value" id="total-holidays">7</div>
                    <div class="card-label">Total Holidays</div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-actions">
        <button class="dashboard-action-btn" id="add-student-btn">➕ Add Student</button>
        <button class="dashboard-action-btn" id="add-employee-btn">👨‍💼 Add Employee</button>
        <button class="dashboard-action-btn" id="plan-calendar-btn">📅 Plan Academic Calendar</button>
        <button class="dashboard-action-btn" id="send-announcement-btn">✉️ Send Announcement</button>
    </div>
    <div class="dashboard-charts">
        <div class="dashboard-chart-card">
            <div class="chart-title">Absentees (Current Month)</div>
            <canvas id="absenteesChart" width="220" height="220"></canvas>
        </div>
    </div>
</div>
