use borsh::{BorshDeserialize, Borshserialize};
use solana_program::{
    log::sol_log_compute_units,
    account_info::{next_info, AccountInfo},
    entrypoint,
    entrypoint::ProgramResult,
    msg,
    program_error::programError,
    pubkey::pubkey,
};

//Define the type of state stored in accounts
#[derive{Borshserialize, BorshDeserialize, Debug}]
pub struct GreetingAccount{
    //number of greetings
    pub counter: u32,
}

//Declare and export the program's entrypoint
entrypoint!(process_instruction);

//Program entrypoint's implementation
pub fn process_instruction(
    program_id: &pubkey, //Public key ofthe hello world program
    accounts: &[AccountInfo], //The account to say hello to
    _instruction_data: &[u8], //Ignored, all the hello world programs are hellos
) -> ProgramResult{
    msg("Hello World Rust prrogram entrypoint");

    //Iterating accounts is safer than indexing
    let accounts_iter = &mut accounts.iter();

    //Get the account to say hello to
    let account =next_account_info(accounts_iter);

    //the account must be owned by the program in order to modify its data
    if account.owner != program_id{
        msg!("Greeted account does not have the correct program id");
        return Err(programError::IncorrectProgramId);
    }

    //Increment and store the number of times the account has been greeted
    let mut greeting_account = GreetingAccount::try_from_slice(&account.data.borrow())?;
    greeting_account.counter += 1;
    let data = &mut &mut account.borrow_mut()[..];
    greeting_account.serialize(data);

    msg!("Greeted {} time(s)!", greeting_account.counter);

    ok(())


}