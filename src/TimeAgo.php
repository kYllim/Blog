<?php

namespace App;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TimeAgo extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('time_ago', [$this, 'timeAgoFilter']),
        ];
    }

    public function timeAgoFilter(\DateTimeInterface $dateTime)
    {
        $now = new \DateTime();
        $interval = $now->diff($dateTime);

        if ($interval->y > 0) {
            return sprintf('il y a %d ans', $interval->y);
        }
        
        if ($interval->m > 0) {
            return sprintf('il y a %d mois', $interval->m);
        }

        if ($interval->days > 0) {
            return sprintf('il y a %d jours', $interval->days);
        }

        if ($interval->h > 0) {
            return sprintf('il y a %d heures', $interval->h);
        }

        if ($interval->i > 0) {
            return sprintf('il y a %d minutes', $interval->i);
        }

        return 'il y a quelques instants';
    }
}
