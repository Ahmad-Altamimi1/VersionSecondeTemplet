export default function formatDate(dateString) {
  const inputDate = new Date(dateString);

  const dateFormatOptions = {
    hour: "2-digit",
    minute: "2-digit",
    month: "short",
    day: "2-digit",
    hour12: true,
  };
  const timeFormatOptions = {
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
  };

  const formattedDate = new Intl.DateTimeFormat(
    "en-US",
    dateFormatOptions
  ).format(inputDate);
  const formattedTime = new Intl.DateTimeFormat(
    "en-US",
    timeFormatOptions
  ).format(inputDate);

  return ` ${formattedDate}`;
}
