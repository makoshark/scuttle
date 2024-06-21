<form id="search" action="<?php echo createURL('search'); ?>" method="post">
    <table>
    <tr>
        <?php
        $logged_on = FALSE;
        if ($userservice->isLoggedOn()) {
          $currentUser = $userservice->getCurrentUser();
          $currentUsername = $currentUser[$userservice->getFieldName('username')];
          $logged_on = TRUE;
        }
        if (!$logged_on && !isset($user)) {
        ?>
        <td><input type="hidden" name="range" value="all" /></td>
        <?php
        } else {
        ?>
        <td><?php echo T_('Search' /* Search ... for */); ?></td>
        <td>
            <select name="range">
                <?php if (isset($currentUsername) && $user != $currentUsername): ?>
                <option value="<?php echo $user ?>"><?php echo T_("this user's bookmarks"); ?></option>
                <?php
                endif;
                if ($logged_on) {
                ?>
                <option value="<?php echo $currentUsername; ?>"><?php echo T_('my bookmarks'); ?></option>
                <option value="watchlist"<?php if (isset($select_watchlist)) { echo $select_watchlist; } ?>><?php echo T_('my watchlist'); ?></option>
                <?php
                }
                ?>
                <option value="all"<?php if (isset($select_all)) { echo $select_all; } ?>><?php echo T_('all bookmarks'); ?></option>
            </select>
        </td>
        <td><?php echo T_('for' /* Search ... for */); ?></td>
        <?php
        }
        ?>
        <td><input type="text" name="terms" size="50" value="<?php if (isset($terms)) { echo filter($terms); } ?>" /></td>
        <td><input type="submit" value="<?php echo T_('Search' /* Submit button */); ?>" /></td>
    </tr>
    </table>
</form>
