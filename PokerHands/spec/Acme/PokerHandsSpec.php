<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokerHandsSpec extends ObjectBehavior
{

    function it_compares_two_hands_for_high_card_ace()
    {
        $this->hand1 = array("2h", "3d", "5s", "9c", "Kd");
        $this->hand2 = array("2c", "3h", "4s", "8c", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_high_card_10()
    {
        $this->hand1 = array("2h", "3d", "5s", "9c", "Td");
        $this->hand2 = array("2c", "3h", "4s", "8c", "9h");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    }


    function it_compares_two_hands_for_a_pair_win()
    {
        $this->hand1 = array("2h", "3d", "5s", "Ac", "Qd");
        $this->hand2 = array("2c", "3h", "4s", "Kc", "Kh");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_with_a_pair()
    {
        $this->hand1 = array("2h", "3d", "5s", "Kc", "Kd");
        $this->hand2 = array("2c", "3h", "4s", "Ac", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_double_pairs_win()
    {
        $this->hand1 = array("2h", "2d", "As", "Ac", "5d");
        $this->hand2 = array("2c", "3h", "4s", "3c", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    }

    function it_compares_two_hands_for_trips_win()
    {
        $this->hand1 = array("2h", "2d", "3s", "Ac", "5d");
        $this->hand2 = array("2c", "4h", "4s", "4c", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_straight_win()
    {
        $this->hand1 = array("2h", "3d", "4d", "5c", "6d");
        $this->hand2 = array("2c", "4h", "4s", "4c", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    }

    function it_compares_two_hands_for_straight_starting_in_ace_win()
    {
        $this->hand1 = array("2h", "3d", "6d", "5c", "6d");
        $this->hand2 = array("Ac", "2h", "3s", "4c", "5h");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_straight_endinf_in_ace_win()
    {
        $this->hand1 = array("2h", "3d", "6d", "5c", "6d");
        $this->hand2 = array("Tc", "Jh", "Qs", "Kc", "Ah");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_flush_win()
    {
        $this->hand1 = array("2h", "3d", "4d", "5c", "6d");
        $this->hand2 = array("2c", "3c", "4c", "6c", "9c");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_hands_for_full_house_win()
    {
        $this->hand1 = array("4h", "4d", "4s", "5c", "5d");
        $this->hand2 = array("2c", "3c", "4c", "6c", "9c");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    }

    function it_compares_two_hands_for_poker_win()
    {
        $this->hand1 = array("2h", "3d", "4s", "5c", "6d");
        $this->hand2 = array("Ac", "Ac", "Ac", "Ac", "3c");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    }

    function it_compares_two_pairs(){
        $this->hand1 = array("2h", "3d", "As", "Kc", "Kd");
        $this->hand2 = array("Qc", "Qh", "Ac", "Kc", "3c");
        $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    }

    // function it_compares_two_pairs_and_wins_the_highest_one() {
    //     $this->hand1 = array("3h", "3d", "5s", "5c", "Ad");
    //     $this->hand2 = array("4s", "4c", "Kc", "Kh", "3c");
    //     $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand2);
    // }

    // function it_tests()
    // {
    //     $this->hand1 = array("4s", "4c", "Kc", "Kh", "3c");
    //     $this->getOrderedArrayOfRanks($this->hand1)->shouldReturn($this->hand1);
    // }

    // function it_compares_two_equal_pairs_and_wins_the_highest_card() {
    //     $this->hand1 = array("4h", "4d", "Ks", "Kc", "Ad");
    //     $this->hand2 = array("4s", "4c", "Kc", "Kh", "3c");
    //     $this->compareHands($this->hand1, $this->hand2)->shouldReturn($this->hand1);
    // }

    // function it_compares_two_equal_pairs_and_wins_the_highest_card()
    // function it_compares_two_double_pairs_and_wins_the_highest_one()
    // function it_compares_two_equal_double_pairs_and_wins_the_highest_card()
    // function it_compares_two_trips_and_wins_the_highest_one()
    // function it_compares_tow_straights_and_wins_the_highest_one()
    // function it_compares_two_flushes_and_wins_the_one_with_the_high_card()


}