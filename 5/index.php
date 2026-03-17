<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-Стартап | Учет рабочего времени</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            background-color: #f8fafc;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Шапка */
        header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo h1 {
            font-size: 1.8rem;
            background: linear-gradient(135deg, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo p {
            font-size: 0.9rem;
            color: #94a3b8;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: rgba(255,255,255,0.1);
            padding: 10px 20px;
            border-radius: 50px;
        }

        .user-name {
            font-weight: 600;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Навигация */
        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        nav ul li a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
        }

        nav ul li a:hover,
        nav ul li a.active {
            color: #fff;
        }

        /* Дата */
        .date-bar {
            background-color: #fff;
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .date-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .current-date {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
        }

        .current-date strong {
            color: #1e293b;
            font-size: 1.2rem;
        }

        .week-info {
            background-color: #f1f5f9;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            color: #475569;
        }

        /* Панель действий */
        .action-panel {
            padding: 40px 0;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .action-card {
            background: linear-gradient(135deg, #fff, #f8fafc);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .employee-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .employee-avatar {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 600;
            color: #fff;
        }

        .employee-details h3 {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }

        .employee-details p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .current-status {
            background-color: #f1f5f9;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-working {
            background-color: #22c55e;
            color: #fff;
        }

        .status-resting {
            background-color: #f97316;
            color: #fff;
        }

        .status-offline {
            background-color: #94a3b8;
            color: #fff;
        }

        .time-display {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-start {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #fff;
        }

        .btn-start:hover {
            background: linear-gradient(135deg, #16a34a, #15803d);
            transform: scale(1.02);
        }

        .btn-stop {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #fff;
        }

        .btn-stop:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: scale(1.02);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .demo-message {
            background-color: #f1f5f9;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
            color: #64748b;
            font-size: 0.95rem;
        }

        .demo-message i {
            font-style: normal;
            background-color: #e2e8f0;
            padding: 2px 8px;
            border-radius: 4px;
            font-family: monospace;
        }

        /* Таблица */
        .stats-section {
            padding: 40px 0;
            background-color: #fff;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .section-header h2 {
            font-size: 1.8rem;
            color: #0f172a;
        }

        .date-picker {
            display: flex;
            gap: 10px;
        }

        .date-picker select,
        .date-picker input {
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            background-color: #fff;
        }

        .table-container {
            background-color: #fff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            overflow-x: auto;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background-color: #f8fafc;
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .employee-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .employee-mini-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .project-tag {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .hours-positive {
            color: #16a34a;
            font-weight: 600;
        }

        .hours-warning {
            color: #f97316;
            font-weight: 600;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background-color: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 4px;
        }

        /* Итого */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .summary-card {
            background: linear-gradient(135deg, #fff, #f8fafc);
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .summary-card h4 {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .summary-card .value {
            font-size: 2rem;
            font-weight: 700;
            color: #0f172a;
        }

        .summary-card .sub {
            color: #94a3b8;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Подвал */
        footer {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 30px 0;
            text-align: center;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                gap: 15px;
            }

            nav ul {
                gap: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .employee-info {
                flex-direction: column;
                text-align: center;
            }

            .date-bar .container {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Уведомление */
        .notification-demo {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #1e293b;
            color: #fff;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: slideIn 0.3s ease;
            border-left: 4px solid #3b82f6;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <?php
    // Массив с сотрудниками
    $employees = [
        [
            'id' => 1,
            'name' => 'Алексей Иванов',
            'position' => 'Team Lead',
            'project' => 'Mobile App',
            'status' => 'working',
            'current_session' => '09:15',
            'total_today' => '3.5',
            'total_week' => '28.5',
            'overtime' => '2.0'
        ],
        [
            'id' => 2,
            'name' => 'Мария Петрова',
            'position' => 'Frontend Developer',
            'project' => 'Web Dashboard',
            'status' => 'working',
            'current_session' => '10:00',
            'total_today' => '4.0',
            'total_week' => '32.0',
            'overtime' => '0'
        ],
        [
            'id' => 3,
            'name' => 'Дмитрий Сидоров',
            'position' => 'Backend Developer',
            'project' => 'API Gateway',
            'status' => 'resting',
            'current_session' => '—',
            'total_today' => '2.5',
            'total_week' => '25.0',
            'overtime' => '0'
        ],
        [
            'id' => 4,
            'name' => 'Елена Козлова',
            'position' => 'QA Engineer',
            'project' => 'Testing',
            'status' => 'working',
            'current_session' => '08:30',
            'total_today' => '5.5',
            'total_week' => '30.5',
            'overtime' => '3.5'
        ],
        [
            'id' => 5,
            'name' => 'Павел Новиков',
            'position' => 'DevOps',
            'project' => 'Infrastructure',
            'status' => 'offline',
            'current_session' => '—',
            'total_today' => '0',
            'total_week' => '18.0',
            'overtime' => '0'
        ],
        [
            'id' => 6,
            'name' => 'Анна Смирнова',
            'position' => 'UX/UI Designer',
            'project' => 'Design System',
            'status' => 'working',
            'current_session' => '09:45',
            'total_today' => '3.0',
            'total_week' => '26.5',
            'overtime' => '1.0'
        ]
    ];

    // Текущий пользователь (для демо)
    $currentUser = $employees[0];

    // Текущая дата и время
    $currentDate = date('d.m.Y');
    $currentTime = date('H:i');
    $currentDay = date('l');

    // Дни недели на русском
    $daysMap = [
        'Monday' => 'Понедельник',
        'Tuesday' => 'Вторник',
        'Wednesday' => 'Среда',
        'Thursday' => 'Четверг',
        'Friday' => 'Пятница',
        'Saturday' => 'Суббота',
        'Sunday' => 'Воскресенье'
    ];

    $currentDayRu = $daysMap[$currentDay];

    // Флаг для демо-уведомления
    $showDemoNotification = isset($_GET['action']) || isset($_POST['action']);
    $demoAction = $_GET['action'] ?? $_POST['action'] ?? '';
    ?>

    <!-- Шапка -->
    <header>
        <div class="container">
            <div class="logo">
                <h1>⚡ DevTime</h1>
                <p>Учет рабочего времени IT-стартапа</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#dashboard" class="active">Дашборд</a></li>
                    <li><a href="#team">Команда</a></li>
                    <li><a href="#reports">Отчеты</a></li>
                    <li><a href="#settings">Настройки</a></li>
                </ul>
            </nav>
            <div class="user-info">
                <span class="user-name"><?php echo $currentUser['name']; ?></span>
                <div class="user-avatar">АИ</div>
            </div>
        </div>
    </header>

    <!-- Дата -->
    <div class="date-bar">
        <div class="container">
            <div class="current-date">
                <span>📅</span>
                <strong><?php echo $currentDate; ?></strong>
                <span>(<?php echo $currentDayRu; ?>)</span>
            </div>
            <div class="week-info">
                ⏱️ Текущее время: <?php echo $currentTime; ?> | Неделя <?php echo date('W'); ?>
            </div>
        </div>
    </div>

    <!-- Панель действий -->
    <section id="dashboard" class="action-panel">
        <div class="container">
            <h2 style="margin-bottom: 30px; color: #0f172a;">Панель управления временем</h2>

            <div class="action-grid">
                <?php foreach ($employees as $employee):
                    $statusClass = '';
                    $statusText = '';

                    switch($employee['status']) {
                        case 'working':
                            $statusClass = 'status-working';
                            $statusText = 'Работает';
                            break;
                        case 'resting':
                            $statusClass = 'status-resting';
                            $statusText = 'Перерыв';
                            break;
                        case 'offline':
                            $statusClass = 'status-offline';
                            $statusText = 'Не в сети';
                            break;
                    }
                ?>
                <div class="action-card">
                    <div class="employee-info">
                        <div class="employee-avatar">
                            <?php
                                $nameParts = explode(' ', $employee['name']);
                                echo substr($nameParts[0], 0, 1) . substr($nameParts[1] ?? '', 0, 1);
                            ?>
                        </div>
                        <div class="employee-details">
                            <h3><?php echo $employee['name']; ?></h3>
                            <p><?php echo $employee['position']; ?> • <?php echo $employee['project']; ?></p>
                        </div>
                    </div>

                    <div class="current-status">
                        <span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                        <span class="time-display">
                            <?php if ($employee['status'] == 'working'): ?>
                                <?php echo $employee['current_session']; ?>
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="action-buttons">
                        <form method="POST" style="flex: 1; display: flex; gap: 10px;">
                            <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">
                            <input type="hidden" name="employee_name" value="<?php echo $employee['name']; ?>">

                            <?php if ($employee['status'] == 'working'): ?>
                                <button type="submit" name="action" value="stop" class="btn btn-stop">
                                    ⏹️ Закончить работу
                                </button>
                                <button type="submit" name="action" value="break" class="btn" style="background: #f97316; color: #fff;">
                                    ☕ Перерыв
                                </button>
                            <?php elseif ($employee['status'] == 'resting'): ?>
                                <button type="submit" name="action" value="resume" class="btn btn-start">
                                    ▶️ Вернуться к работе
                                </button>
                                <button type="submit" name="action" value="stop" class="btn btn-stop">
                                    ⏹️ Закончить
                                </button>
                            <?php else: ?>
                                <button type="submit" name="action" value="start" class="btn btn-start">
                                    ▶️ Начать работу
                                </button>
                                <button type="submit" name="action" value="start" class="btn btn-start" style="opacity: 0.5;" disabled>
                                    ⏹️ Закончить
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>

                    <div class="demo-message">
                        <span>🔄 Демо-режим: кнопки работают как заглушка</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Таблица статистики -->
    <section class="stats-section">
        <div class="container">
            <div class="section-header">
                <h2>📊 Учет рабочего времени</h2>
                <div class="date-picker">
                    <select>
                        <option>Текущая неделя</option>
                        <option>Прошлая неделя</option>
                        <option>Текущий месяц</option>
                        <option>Прошлый месяц</option>
                    </select>
                    <input type="date" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Сотрудник</th>
                            <th>Должность</th>
                            <th>Проект</th>
                            <th>Статус</th>
                            <th>Начало смены</th>
                            <th>Сегодня</th>
                            <th>За неделю</th>
                            <th>Переработка</th>
                            <th>Прогресс (40ч)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee):
                            $progress = min(100, ($employee['total_week'] / 40) * 100);
                            $statusBadgeClass = '';
                            $statusText = '';

                            switch($employee['status']) {
                                case 'working':
                                    $statusBadgeClass = 'status-working';
                                    $statusText = 'Работает';
                                    break;
                                case 'resting':
                                    $statusBadgeClass = 'status-resting';
                                    $statusText = 'Перерыв';
                                    break;
                                case 'offline':
                                    $statusBadgeClass = 'status-offline';
                                    $statusText = 'Не в сети';
                                    break;
                            }
                        ?>
                        <tr>
                            <td>
                                <div class="employee-cell">
                                    <div class="employee-mini-avatar">
                                        <?php
                                            $nameParts = explode(' ', $employee['name']);
                                            echo substr($nameParts[0], 0, 1) . substr($nameParts[1] ?? '', 0, 1);
                                        ?>
                                    </div>
                                    <?php echo $employee['name']; ?>
                                </div>
                            </td>
                            <td><?php echo $employee['position']; ?></td>
                            <td><span class="project-tag"><?php echo $employee['project']; ?></span></td>
                            <td><span class="status-badge <?php echo $statusBadgeClass; ?>"><?php echo $statusText; ?></span></td>
                            <td><?php echo $employee['current_session']; ?></td>
                            <td class="hours-positive"><?php echo $employee['total_today']; ?> ч</td>
                            <td class="<?php echo $employee['total_week'] > 40 ? 'hours-warning' : 'hours-positive'; ?>">
                                <?php echo $employee['total_week']; ?> ч
                            </td>
                            <td class="hours-warning"><?php echo $employee['overtime']; ?> ч</td>
                            <td style="min-width: 150px;">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?php echo $progress; ?>%;"></div>
                                </div>
                                <div style="font-size: 0.8rem; color: #64748b; margin-top: 5px;">
                                    <?php echo round($progress); ?>% от нормы
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Карточки с итогами -->
            <div class="summary-cards">
                <?php
                $totalHoursWeek = array_sum(array_column($employees, 'total_week'));
                $totalOvertime = array_sum(array_column($employees, 'overtime'));
                $workingNow = count(array_filter($employees, function($e) { return $e['status'] == 'working'; }));
                ?>
                <div class="summary-card">
                    <h4>Всего часов за неделю</h4>
                    <div class="value"><?php echo $totalHoursWeek; ?></div>
                    <div class="sub">по всем сотрудникам</div>
                </div>
                <div class="summary-card">
                    <h4>Переработка</h4>
                    <div class="value"><?php echo $totalOvertime; ?></div>
                    <div class="sub">часов сверх нормы</div>
                </div>
                <div class="summary-card">
                    <h4>Сейчас работают</h4>
                    <div class="value"><?php echo $workingNow; ?></div>
                    <div class="sub">из <?php echo count($employees); ?> сотрудников</div>
                </div>
                <div class="summary-card">
                    <h4>Средняя нагрузка</h4>
                    <div class="value"><?php echo round($totalHoursWeek / count($employees), 1); ?></div>
                    <div class="sub">часов на сотрудника</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <p>⚡ DevTime — система учета рабочего времени для IT-стартапов</p>
            <p style="margin-top: 10px; font-size: 0.9rem;">© <?php echo date('Y'); ?> Все права защищены. Демо-версия без БД</p>
            <p style="margin-top: 5px; font-size: 0.8rem;">Сегодня <?php echo $currentDate; ?>, <?php echo $currentTime; ?></p>
        </div>
    </footer>

    <!-- Демо-уведомление при нажатии кнопок -->
    <?php if ($showDemoNotification): ?>
    <div class="notification-demo" id="demoNotification">
        <strong>🔄 Демо-режим</strong>
        <p style="margin-top: 5px; font-size: 0.9rem;">
            <?php
            $actionMessages = [
                'start' => 'Начало работы отмечено в системе (заглушка)',
                'stop' => 'Окончание работы отмечено в системе (заглушка)',
                'break' => 'Начало перерыва отмечено в системе (заглушка)',
                'resume' => 'Возврат с перерыва отмечен в системе (заглушка)'
            ];

            $employeeName = $_POST['employee_name'] ?? $_GET['employee_name'] ?? 'Сотрудник';
            $actionText = $actionMessages[$demoAction] ?? 'Действие зарегистрировано в системе (заглушка)';

            echo htmlspecialchars($employeeName) . ': ' . $actionText;
            ?>
        </p>
        <p style="font-size: 0.8rem; color: #94a3b8; margin-top: 5px;">
            Время: <?php echo date('H:i:s'); ?>
        </p>
    </div>

    <script>
        // Автоматически скрыть уведомление через 3 секунды
        setTimeout(function() {
            var notification = document.getElementById('demoNotification');
            if (notification) {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.5s';
                setTimeout(function() {
                    notification.remove();
                }, 500);
            }
        }, 3000);
    </script>
    <?php endif; ?>

    <script>
        // Подтверждение действий для демо
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                // Не блокируем отправку, просто покажем дополнительное сообщение
                console.log('Демо-режим: форма отправлена');
            });
        });

        // Подсветка активной кнопки в навигации
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('nav a').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>