<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $_personList;

    public function __construct(array $personList)
    {
        $this->_personList = $personList;
    }

    public function find(int $aFinderCriteria): PersonaPair
    {
        /** @var PersonaPair[] $personPairList */
        $personPairList = [];

        $numberOfPerson = count($this->_personList);
        for ($i = 0; $i < $numberOfPerson; $i++) {
            for ($j = $i + 1; $j < $numberOfPerson; $j++) {
                $aPersonPair = new PersonaPair();

                if ($this->_personList[$i]->birthDate < $this->_personList[$j]->birthDate) {
                    $aPersonPair->person1 = $this->_personList[$i];
                    $aPersonPair->person2 = $this->_personList[$j];
                } else {
                    $aPersonPair->person1 = $this->_personList[$j];
                    $aPersonPair->person2 = $this->_personList[$i];
                }

                $aPersonPair->distanceBetweenBirthDay = $aPersonPair->person2->birthDate->getTimestamp()
                    - $aPersonPair->person1->birthDate->getTimestamp();

                $personPairList[] = $aPersonPair;
            }
        }

        $areEnoughPersonPairs = count($personPairList) < 1;
        if ($areEnoughPersonPairs) {
            return new PersonaPair();
        }

        $answer = $personPairList[0];

        foreach ($personPairList as $result) {
            switch ($aFinderCriteria) {
                case FinderCriteria::CLOSE_BIRTHDAY:
                    if ($result->distanceBetweenBirthDay < $answer->distanceBetweenBirthDay) {
                        $answer = $result;
                    }
                    break;

                case FinderCriteria::FURTHEST_BIRTHDAY:
                    if ($result->distanceBetweenBirthDay > $answer->distanceBetweenBirthDay) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
