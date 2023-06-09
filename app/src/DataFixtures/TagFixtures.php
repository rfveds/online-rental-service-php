<?php
/**
 * Tag fixture.
 */

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TagFixtures.
 */
class TagFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(
            20,
            'tags',
            function ($i) {
                $tag = new Tag();
                $tag->setTitle($this->faker->word);

                return $tag;
            }
        );

        $manager->flush();
    }
}
