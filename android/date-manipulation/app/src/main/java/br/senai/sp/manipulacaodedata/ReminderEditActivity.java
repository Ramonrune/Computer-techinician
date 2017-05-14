package br.senai.sp.manipulacaodedata;

import android.app.Fragment;
import android.app.FragmentTransaction;
import android.os.Bundle;


public class ReminderEditActivity  implements
        OnFinishEditor {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.reminder_edit_activity);

        Fragment fragment = getSupportFragmentManager().findFragmentByTag(
                ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);

        if (fragment == null) {
            fragment = new ReminderEditFragment();
            Bundle args = new Bundle();
            args.putLong(ReminderProvider.COLUMN_ROWID, getIntent()
                    .getLongExtra(ReminderProvider.COLUMN_ROWID, 0L));
            fragment.setArguments(args);

            FragmentTransaction transaction = getSupportFragmentManager()
                    .beginTransaction();
            transaction.add(R.id.edit_container, fragment,
                    ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);
            transaction.commit();
        }
    }

    @Override
    public void finishEditor() {
        finish();
    }
}
