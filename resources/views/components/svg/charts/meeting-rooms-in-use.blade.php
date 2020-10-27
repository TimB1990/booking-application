<div class="single-chart">
    <svg viewBox="0 0 40 40" class="circular-chart orange">
        <path
        class="circle-bg"
          d="M18 2.0845
            a 15.9155 15.9155 0 0 1 0 31.831
            a 15.9155 15.9155 0 0 1 0 -31.831"
          fill="none"
          stroke="#444";
          stroke-width="1";
        />
        <path class="circle"
        stroke-dasharray="50, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      </svg>
      <span class="single-chart-description">Meeting Rooms</span>
    <span class="single-chart-status">0 / {{ $accommodation->amount_meeting_rooms }}</span>
</div>