<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
   
      <li class="nav-item">
        <a class="nav-link " href="index.php?page=dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

   
      <li class="nav-heading">Master Data</li>
    <?php if($category == 'A' ){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=academic_year">
          <i class="bi bi-calendar"></i>
          <span>Academic Year</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=exemplary_students">
          <i class="bi bi-file-richtext"></i>
          <span>Application For Exemplary Students</span>
        </a>
      </li>
    <?php } ?>

    <?php if($category == 'A' || $category == 'S'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=calendar_of_activities">
          <i class="bi bi-calendar-event"></i>
          <span>Calendar of Activities</span>
        </a>
      </li>
    <?php } ?>
    

    <?php if($category == 'A' ){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=courses">
          <i class="bi bi-collection"></i>
          <span>Courses</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=good_moral_releasing">
          <i class="bi bi-file-earmark-person"></i>
          <span>Good Moral Releasing</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=osa_checklist_requirements">
          <i class="bi bi-list-check"></i>
          <span>OSA Checklist Requirements</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=services">
          <i class="bi bi-file-earmark-ruled"></i>
          <span>Services Under OSA</span>
        </a>
      </li>

      <!-- <li class="nav-heading">Sanctions & Violations</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=offenses">
          <i class="bi bi-dash-circle"></i>
          <span>Offenses</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=sanctions">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Sanctions</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=violations">
          <i class="bi bi-card-list"></i>
          <span>Violation</span>
        </a>
      </li> -->

      <li class="nav-heading">Organizations</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=clubs">
          <i class="bi bi-house"></i>
          <span>Clubs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=organizational_officers">
          <i class="bi bi-person-lines-fill"></i>
          <span>Organizational Officers</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=students">
          <i class="bi bi-people-fill"></i>
          <span>Students</span>
        </a>
      </li>

      <li class="nav-heading">Security</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=users">
          <i class="bi bi-person-circle"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-heading">Report</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=checklist_report">
          <i class="bi bi-list"></i>
          <span>Checklist Report</span>
        </a>
      </li>
      <?php } ?>
    </ul>


  </aside><!-- End Sidebar-->